<?php

header('Content-Type: text/plain');

$files = scandir(dirname(__FILE__));

if (is_array($files)) {
    $matching = preg_grep('/\.php$/', $files);
    var_dump($matching);
}
