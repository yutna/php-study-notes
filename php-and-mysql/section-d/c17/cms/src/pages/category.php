<?php

declare(strict_types=1);

require '../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    include APP_ROOT . '/public/page-not-found.php';
}

$category = $cms->getCategory()->get($id);

if (!$category) {
    include  APP_ROOT . '/public/page-not-found.php';
}

$data['category'] = $category;
$data['articles'] = $cms->getArticle()->getAll(true, $id);
$data['navigation'] = $cms->getCategory()->getAll();
$data['section'] = $category['id'];
$data['title'] = $category['name'];
$data['description'] = $category['description'];

echo $twig->render('category.html.twig', $data);
