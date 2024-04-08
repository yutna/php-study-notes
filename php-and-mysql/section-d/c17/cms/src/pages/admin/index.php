<?php

declare(strict_types=1);

is_admin($session->role);

$data['article_count'] = $cms->getArticle()->count();
$data['category_count'] = $cms->getCategory()->count();
$data['member_count'] = $cms->getMember()->count();

echo $twig->render('admin/index.html.twig', $data);
