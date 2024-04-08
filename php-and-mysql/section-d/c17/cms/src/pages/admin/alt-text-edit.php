<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

is_admin($session->role);

$article = [];
$errors = [
    'warning' => '',
    'alt' => '',
];

if (!$id) {
    redirect('admin/articles/', ['failure' => 'Article not found']);
}

$article = $cms->getArticle()->get($id, false);

if (!$article['image_file']) {
    redirect('admin/article/' . $id . '/');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article['image_alt'] = $_POST['image_alt'];
    $errors['alt'] = Validate::isText($article['image_alt'], 1, 254) ? '' : 'Alt text for image should be 1-254 characters.';

    if ($errors['alt']) {
        $errors['warning'] = 'Please correct error below';
    } else {
        $cms->getArticle()->altUpdate($article['image_id'], $article['image_alt']);
        redirect('admin/article/' . $id . '/');
    }
}

$data['id'] = $id;
$data['article'] = $article;
$data['errors'] = $errors;

echo $twig->render('admin/alt-text-edit.html.twig', $data);
