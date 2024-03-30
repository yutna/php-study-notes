<?php

declare(strict_types=1);

require '../src/bootstrap.php';

$data['articles'] = $cms->getArticle()->getAll(true, null, null, 6);
$data['navigation'] = $cms->getCategory()->getAll();

echo $twig->render('index.html.twig', $data);
