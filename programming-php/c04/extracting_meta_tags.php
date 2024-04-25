<?php

header('Content-Type: text/plain');

// ใช้ url
$metaTags = get_meta_tags('https://github.com/');
var_dump($metaTags);
echo "\n";

// ใช้ file
$metaTags = get_meta_tags("sample.html");
var_dump($metaTags);
