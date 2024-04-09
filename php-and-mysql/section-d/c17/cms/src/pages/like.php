<?php

declare(strict_types=1);

if (!$id || $cms->getSession()->id === 0) {
    include APP_ROOT . '/src/pages/page-not-found.php';
}

$liked = $cms->getLike()->get([$id, $session->id]);

if ($liked) {
    $cms->getLike()->delete([$id, $session->id]);
} else {
    $cms->getLike()->create([$id, $session->id]);
}

redirect('article/' . $id . '/' . $parts[3] . '/');
