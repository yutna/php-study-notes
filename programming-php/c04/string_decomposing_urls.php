<?php

header("Content-Type: text/plain");

// The parse_url() funciton return an array of components of a URL.
// $array = parse_url(url);

$bits = parse_url("http://me:secret@example.com/cgi-bin/board?user=fred");
print_r($bits);

// Array
// (
//     [scheme] => http
//     [host] => example.com
//     [user] => me
//     [pass] => secret
//     [path] => /cgi-bin/board
//     [query] => user=fred
// )
