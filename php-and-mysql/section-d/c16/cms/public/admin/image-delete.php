<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

is_admin($session->role);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirect('articles.php', ['failure' => 'Article not found']);
}

$article = $cms->getArticle()->get($id, false);

if (!$article['image_file']) {
    redirect('article.php', ['id' => $id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = UPLOADS . $article['image_file'];
    $cms->getArticle()->imageDelete($article['image_id'], $path, $id);
    redirect('article.php', ['id' => $id]);
}

$data['id'] = $id;
$data['article'] = $article;

echo $twig->render('admin/image-delete.html.twig', $data);
