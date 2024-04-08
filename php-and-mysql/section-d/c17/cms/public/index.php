<?php

require '../src/bootstrap.php';

$uri = mb_strtolower($_SERVER['REQUEST_URI']);
$parsed_url = parse_url($uri);
$path = mb_substr($parsed_url['path'], mb_strlen(DOC_ROOT));
$parts = explode('/', $path);

if ($parts[1] != 'admin') {
    $page = $parts[1] ?: 'index';
    $id = $parts[2] ?? null;
} else {
    $page = 'admin/' . ($parts[2] ?? 'index');
    $id = $parts[3] ?? null;
}

$id = filter_var($id, FILTER_VALIDATE_INT);
$php_page = APP_ROOT . '/src/pages/' . $page . '.php';

if (!file_exists($php_page)) {
    $php_page = APP_ROOT . '/src/pages/page-not-found.php';
}

include $php_page;
