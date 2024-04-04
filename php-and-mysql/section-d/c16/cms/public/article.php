<?php

declare(strict_types=1);

require '../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    include APP_ROOT . '/public/page-not-found.php';
}

$article = $cms->getArticle()->get($id);

if (!$article) {
    include APP_ROOT . '/public/page-not-found.php';
}

$navigation = $cms->getCategory()->getAll();

$data['article'] = $article;
$data['navigation'] = $navigation;
$data['section'] = $article['category_id'];
$data['title'] = $article['title'];
$data['description'] = $article['summary'];

echo $twig->render('article.html.twig', $data);
