<?php

declare(strict_types=1);

is_admin($cms->getSession()->role);

$data['navigation'] = $cms->getCategory()->getAll();
$data['success'] = $_GET['success'] ?? null;
$data['failure'] = $_GET['failure'] ?? null;
$data['members'] = $cms->getMember()->getAll();

echo $twig->render('admin/members.html.twig', $data);
