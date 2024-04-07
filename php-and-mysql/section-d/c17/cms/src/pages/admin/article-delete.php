<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

is_admin($session->role);

$deleted = null;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirect('articles.php', ['failure' => 'Article not found']);
}

$article = $cms->getArticle()->get($id, false);

if (!$article) {
    redirect('articles.php', ['failure' => 'Article not found']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($article['image_id'])) {
        $path = UPLOADS . $article['image_file'];
        $cms->getArticle()->imageDelete($article['image_id'], $path, $id);
    }

    $deleted = $cms->getArticle()->delete($id);

    if ($deleted) {
        redirect('articles.php', ['success' => 'Article deleted']);
    } else {
        throw new Exception('Unable to delete article');
    }
}

$data['id'] = $id;
$data['article'] = $article;

echo $twig->render('admin/article-delete.html.twig', $data);
