<?php

declare(strict_types=1);

$term = filter_input(INPUT_GET, 'term');
$show = filter_input(INPUT_GET, 'show', FILTER_VALIDATE_INT) ?? 3;
$from = filter_input(INPUT_GET, 'from', FILTER_VALIDATE_INT) ?? 0;

$count = 0;
$total_pages = 0;
$current_page = 0;
$articles = [];

if ($term) {
    $count = $cms->getArticle()->searchCount($term);

    if ($count > 0) {
        $articles = $cms->getArticle()->search($term, $show, $from);
    }
}

if ($count > $show) {
    $total_pages = ceil($count / $show);
    $current_page = ceil($from / $show) + 1;
}

$data['term'] = $term;
$data['show'] = $show;
$data['from'] = $from;
$data['count'] = $count;
$data['articles'] = $articles;
$data['total_pages'] = $total_pages;
$data['current_page'] = $current_page;
$data['navigation'] = $cms->getCategory()->getAll();
$data['title'] = 'Search results for ' . $term;
$data['description'] = $data['title'] . ' on Creative Folk';

echo $twig->render('search.html.twig', $data);
