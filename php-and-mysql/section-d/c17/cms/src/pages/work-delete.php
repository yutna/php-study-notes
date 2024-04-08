<?php

declare(strict_types=1);

if (!$id) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

$article = $cms->getArticle()->get($id, false);

if (!$article) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

if ($article['member_id'] !== $cms->getSession()->id) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($article['image_id'])) {
        $path = APP_ROOT . '/public/uploads/' . $article['image_file'];
        $cms->getArticle()->imageDelete($article['image_id'], $path, $article['id']);
    }

    $cms->getArticle()->delete($id);

    redirect('member/' . $cms->getSession()->id . '/', ['success' => 'Article deleted']);
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['article'] = $article;

echo $twig->render('work-delete.html.twig', $data);
