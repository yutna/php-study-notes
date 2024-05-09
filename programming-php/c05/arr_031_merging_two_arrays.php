<?php

header('Content-Type: text/plain');

// The `array_merge()` function intelligently merges two or more arrays
// $merged = array_merge(array1, array2 [, array3...]);

// If a numberic key from an earlier array is repeated, the value from the later
// array is assigned a new numberic key

$first = array('hello', 'world');
$second = array('exit', 'here');

$merged = array_merge($first, $second);
print_r($merged);
// Array
// (
//     [0] => hello
//     [1] => world
//     [2] => exit
//     [3] => here
// )

// If a string key from an earlier array is repeated, the earlier value is
// replaced by the later value
$first = array('bill' => 'clinton', 'tony' => 'danza');
$second = array('bill' => 'gates', 'adam' => 'west');

$merged = array_merge($first, $second);
print_r($merged);
// Array
// (
//     [bill] => gates
//     [tony] => danza
//     [adam] => west
// )
