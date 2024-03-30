<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$data['success'] = $_GET['success'] ?? null;
$data['failure'] = $_GET['failure'] ?? null;
$data['categories'] = $cms->getCategory()->getAll();

echo $twig->render('admin/categories.html.twig', $data);
