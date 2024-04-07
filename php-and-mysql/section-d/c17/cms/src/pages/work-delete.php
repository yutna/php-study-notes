<?php

declare(strict_types=1);

require '../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    include APP_ROOT . '/public/page-not-found.php';
}

$article = $cms->getArticle()->get($id, false);

if (!$article) {
    include APP_ROOT . '/public/page-not-found.php';
}

if ($article['member_id'] !== $cms->getSession()->id) {
    include APP_ROOT . '/public/page-not-found.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($article['image_id'])) {
        $path = APP_ROOT . '/public/uploads/' . $article['image_file'];
        $cms->getArticle()->imageDelete($article['image_id'], $path, $article['id']);
    }

    $cms->getArticle()->delete($id);

    redirect('member.php', [
        'id' => $cms->getSession()->id,
        'success' => 'Article deleted'
    ]);
}

$data['navigation'] = $cms->getCategory()->getAll();
$data['article'] = $article;

echo $twig->render('work-delete.html.twig', $data);
