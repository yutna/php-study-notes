<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$data['success'] = $_GET['success'] ?? null;
$data['failure'] = $_GET['failure'] ?? null;
$data['articles'] = $cms->getArticle()->getAll(false);

echo $twig->render('admin/articles.html.twig', $data);
