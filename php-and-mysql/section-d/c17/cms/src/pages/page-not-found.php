<?php

declare(strict_types=1);

http_response_code(404);

$data['navigation'] = $cms->getCategory()->getAll();
$data['title'] = 'Page not found';
$data['description'] = 'Sorry, we could not find that page';

echo $twig->render('page-not-found.html.twig', $data);
exit;
