<?php

declare(strict_types=1);

is_admin($session->role);

if (!$id) {
    redirect('admin/articles/', ['failure' => 'Article not found']);
}

$article = $cms->getArticle()->get($id, false);

if (!$article['image_file']) {
    redirect('admin/article/' . $id . '/');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = UPLOADS . $article['image_file'];
    $cms->getArticle()->imageDelete($article['image_id'], $path, $id);
    redirect('admin/article/' . $id . '/');
}

$data['id'] = $id;
$data['article'] = $article;

echo $twig->render('admin/image-delete.html.twig', $data);
