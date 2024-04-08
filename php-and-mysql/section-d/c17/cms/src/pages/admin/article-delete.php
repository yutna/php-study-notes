<?php

declare(strict_types=1);

is_admin($session->role);

$deleted = null;

if (!$id) {
    redirect('admin/articles/', ['failure' => 'Article not found']);
}

$article = $cms->getArticle()->get($id, false);

if (!$article) {
    redirect('admin/articles/', ['failure' => 'Article not found']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($article['image_id'])) {
        $path = UPLOADS . $article['image_file'];
        $cms->getArticle()->imageDelete($article['image_id'], $path, $id);
    }

    $deleted = $cms->getArticle()->delete($id);

    if ($deleted) {
        redirect('admin/articles/', ['success' => 'Article deleted']);
    } else {
        throw new Exception('Unable to delete article');
    }
}

$data['id'] = $id;
$data['article'] = $article;

echo $twig->render('admin/article-delete.html.twig', $data);
