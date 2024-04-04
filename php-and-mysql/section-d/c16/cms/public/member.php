<?php

declare(strict_types=1);

require '../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    include APP_ROOT . '/public/page-not-found.php';
}

$member = $cms->getMember()->get($id);

if (!$member) {
    include APP_ROOT . '/public/page-not-found.php';
}

$data['member'] = $member;
$data['articles'] = $cms->getArticle()->getAll(true, null, $id);;
$data['navigation'] = $cms->getCategory()->getAll();;
$data['title'] = $member['forename'] . ' ' . $member['surname'];
$data['description'] = $data['title'] . ' on Creative Folk';

echo $twig->render('member.html.twig', $data);
