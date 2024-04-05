<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

require '../src/bootstrap.php';

if ($session->id === 0) {
    redirect('login.php');
}

$article = [];
$errors = [];
$temp = $_FILES['image']['tmp_name'] ?? '';
$destination = '';
$saved = null;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $article = $cms->getArticle()->get($id);

    if (!$article) {
        include APP_ROOT . '/public/page-not-found.php';
    }

    if ($article['member_id'] !== $cms->getSession()->id) {
        include APP_ROOT . '/public/page-not-found.php';
    }
}

$saved_image = $article['image_file'] ?? false;
$categories = $cms->getCategory()->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $errors['image_file'] = $_FILES['image']['error'] === 1 ? 'File too big ' : '';
    }

    if ($temp && ($_FILES['image']['error'] === 0)) {
        $errors['image_file'] = in_array(mime_content_type($temp), MEDIA_TYPES) ? '' : 'Wrong file type. ';
        $errors['image_file'] .= $_FILES['image']['size'] <= MAX_SIZES ? '' : 'File too big. ';

        $article['image_alt'] = $_POST['image_alt'];
        $errors['image_alt'] = Validate::isText($article['image_alt'], 1, 254) ? '' : 'Alt text can be 1-1000 characters.';

        if (($errors['image_file'] === '') && ($errors['image_alt'] === '')) {
            $article['image_file'] = create_filename($_FILES['image']['name'], UPLOADS);
            $destination = UPLOADS . $article['image_file'];
        }
    }

    $article['title'] = $_POST['title'];
    $article['summary'] = $_POST['summary'];
    $article['content'] = $_POST['content'];
    $article['member_id'] = $_POST['member_id'];
    $article['category_id'] = $_POST['category_id'];
    $article['published'] = 1;
    $article['seo_title'] = create_seo_name($article['title']);

    $purifier = new \HTMLPurifier();
    $purifier->config->set('HTML.Allowed', 'p,br,strong,em,b,i,a[href],img[src|alt]');
    $article['content'] = $purifier->purify($article['content']);

    $errors['title'] = Validate::isText($article['title'], 1, 80) ? '' : 'Title should be 1 - 80 characters.';
    $errors['summary'] = Validate::isText($article['summary'], 1, 254) ? '' : 'Summary should be 1 - 254 characters.';
    $errors['content'] = Validate::isText($article['content'], 1, 100000) ? '' : 'Content should be 1 - 100,000 characters.';
    $errors['category'] = Validate::isCategoryId($article['category_id'], $categories) ? '' : 'Not a valid category.';

    $temp = $_FILES['image']['tmp_name'] ?? '';

    if (($id == false) && ($temp == '')) {
        $errors['image_file'] = 'Please upload an image';
    }

    $invalid = implode($errors);

    if ($invalid) {
        $errors['message'] = 'Please correct from errors';
    } else {
        if ($id) {
            $saved = $cms->getArticle()->update($article, $temp, $destination);
        } else {
            var_dump($article);
            var_dump($temp);
            var_dump($destination);
            $saved = $cms->getArticle()->create($article, $temp, $destination);
        }

        if ($saved) {
            redirect('member.php', ['id' => $cms->getSession()->id]);
        } else {
            $errors['message'] = 'Article title already in use';
        }
    }

    $article['image_file'] = $saved_image ? $article['image_file'] : '';
}

$data['navigation'] = $categories;
$data['categories'] = $categories;
$data['article'] = $article;
$data['errors'] = $errors;

echo $twig->render('work.html.twig', $data);
