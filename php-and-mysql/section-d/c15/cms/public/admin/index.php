<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$data['article_count'] = $cms->getArticle()->count();
$data['category_count'] = $cms->getCategory()->count();

echo $twig->render('admin/index.html.twig', $data);
