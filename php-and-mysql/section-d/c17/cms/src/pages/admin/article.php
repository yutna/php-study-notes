<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

is_admin($session->role);

$temp = $_FILES['image']['tmp_name'] ?? '';
$destination = '';
$saved = null;

$article = [
    'id' => $id,
    'title' => '',
    'summary' => '',
    'content' => '',
    'published' => false,
    'member_id' => 0,
    'category_id' => 0,
    'image_id' => null,
    'image_file' => '',
    'image_alt' => '',
];

$errors = [
    'warning' => '',
    'title' => '',
    'summary' => '',
    'content' => '',
    'author' => '',
    'category' => '',
    'image_file' => '',
    'image_alt' => '',
];

if ($id) {
    $article = $cms->getArticle()->get($id, false);

    if (!$article) {
        redirect('admin/articles/', ['failure' => 'Article not found']);
    }
}

$saved_image = $article['image_file'] ? true : false;
$authors = $cms->getMember()->getAll();
$categories = $cms->getCategory()->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $errors['image_file'] = ($temp === '') && ($_FILES['image']['error'] === 1) ? 'File too big ' : '';
    }

    if ($temp && $_FILES['image']['error'] === 0) {
        $article['image_alt'] = $_POST['image_alt'];
        $ext = mb_strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        $errors['image_file'] .= in_array(mime_content_type($temp), MEDIA_TYPES) ? '' : 'Wrong file type. ';
        $errors['image_file'] .= in_array($ext, FILE_EXTENSIONS) ? '' : 'Wrong file extension. ';
        $errors['image_file'] .= $_FILES['image']['size'] <= MAX_SIZES ? '' : 'File too big. ';

        $errors['image_alt'] = Validate::isText($article['image_alt'], 1, 254) ? '' : 'Alt text must be 1-254 characters.';

        if (($errors['image_file'] == '') && ($errors['image_alt'] == '')) {
            $article['image_file'] = create_filename($_FILES['image']['name'], UPLOADS);
            $destination = UPLOADS . $article['image_file'];
        }
    }

    $article['title'] = $_POST['title'];
    $article['summary'] = $_POST['summary'];
    $article['content'] = $_POST['content'];
    $article['member_id'] = $_POST['member_id'];
    $article['category_id'] = $_POST['category_id'];
    $article['published'] = isset($_POST['published']) && ($_POST['published'] == 1) ? 1 : 0;
    $article['seo_title'] = create_seo_name($article['title']);

    $purifier = new \HTMLPurifier();
    $purifier->config->set('HTML.Allowed', 'p,br,b,i,a[href],img[src|alt]');
    $article['content'] = $purifier->purify($article['content']);

    $errors['title'] = Validate::isText($article['title'], 1, 80) ? '' : 'Title mush be 1-80 characters';
    $errors['summary'] = Validate::isText($article['summary'], 1, 254) ? '' : 'Summary must be 1-254 characters';
    $errors['content'] = Validate::isText($article['content'], 1, 100000) ? '' : 'Article must be 1-100,000 characters';
    $errors['member'] = Validate::isMemberId($article['member_id'], $authors) ? '' : 'Please select an author';
    $errors['category'] = Validate::isCategoryId($article['category_id'], $categories) ? '' : 'Please select a category';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['warning'] = 'Please correct the errors below';
    } else {
        $arguments = $article;

        if ($id) {
            $saved = $cms->getArticle()->update($arguments, $temp, $destination);
        } else {
            unset($arguments['id']);
            $saved = $cms->getArticle()->create($arguments, $temp, $destination);
        }

        if ($saved) {
            redirect('admin/articles/', ['success' => 'Article saved']);
        } else {
            $errors['warning'] = 'Article title already in use';
        }
    }

    $article['image_file'] = $saved_image ? $article['image_file'] : '';
}

$data['id'] = $id;
$data['errors'] = $errors;
$data['article'] = $article;
$data['authors'] = $authors;
$data['categories'] = $categories;

echo $twig->render('admin/article.html.twig', $data);
