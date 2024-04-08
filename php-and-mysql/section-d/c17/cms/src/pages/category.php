<?php

declare(strict_types=1);

if (!$id) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

$category = $cms->getCategory()->get($id);

if (!$category) {
    include  APP_ROOT . '/src/pages/page-not-found.php';
}

if (mb_strtolower($parts[3]) != mb_strtolower($category['seo_name'])) {
    redirect('category/' . $id . '/' . $category['seo_name'], [], 301);
}

$data['category'] = $category;
$data['articles'] = $cms->getArticle()->getAll(true, $id);
$data['navigation'] = $cms->getCategory()->getAll();
$data['section'] = $category['id'];
$data['title'] = $category['name'];
$data['description'] = $category['description'];

echo $twig->render('category.html.twig', $data);
