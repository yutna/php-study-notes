<?php

header("Content-Type: text/plain");

define('HOST', 'http://localhost');

$path = "Programming PHP";
$encoded_path = rawurlencode($path); // Programming%20PHP
echo HOST . "/" . $encoded_path; // http://localhost/Programming%20PHP

echo "\n";

$decoded_path = rawurldecode($encoded_path);
echo $decoded_path; // Programming PHP
