<?php

header('Content-Type: text/plain');

// JSON is built on two structures
// 1) Collections of name/value pairs called `objects` (PHP's associative array)
// 2) Ordered lists of values called `arrays` (PHP's indexed array)

// Each value can be one of a number of types:
// 1) An object
// 2) An array
// 3) A string
// 4) A number
// 5) The boolean
// 6) NULL

// The `json` extension, included by default in PHP installation, natively
// supports converting data to JSON format from PHP variables and vice versa.

// To get a JSON representation of a PHP variable, use `json_encode()`
$data = array(1, 2, 'three');
$json_data = json_encode($data);
echo $json_data . "\n";

// Similarly, if you have a string containing JSON data, you can turn it into a
// PHP variable using `json_decode()`
$json_data = "[1, 2, [3, 4], \"five\"]";
$data = json_decode($json_data);
print_r($data) . "\n";

// If the string is invalid JSON, or if the string is NOT encoded in UTF-8
// format, a single NULL value is returned instead.
