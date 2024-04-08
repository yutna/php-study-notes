<?php

declare(strict_types=1);

if (!$id) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

$article = $cms->getArticle()->get($id);

if (!$article) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

if (mb_strtolower($parts[3]) != mb_strtolower($article['seo_title'])) {
    redirect('article/' . $id . '/' . $article['seo_title'], [], 301);
}

$navigation = $cms->getCategory()->getAll();

$data['article'] = $article;
$data['navigation'] = $navigation;
$data['section'] = $article['category_id'];
$data['title'] = $article['title'];
$data['description'] = $article['summary'];

echo $twig->render('article.html.twig', $data);
