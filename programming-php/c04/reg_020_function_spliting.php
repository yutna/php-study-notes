<?php

header('Content-Type: text/plain');

$operands = preg_split('{[+*/-]}', '3+5*9/2');
var_dump($operands); // [3, 5, 9, 2]

echo "\n------------------------------------------------------------------\n\n";

$operands = preg_split('{([+*/-])}', '3+5*9/2', -1, PREG_SPLIT_DELIM_CAPTURE);
var_dump($operands); // [3, +, 5, *, 9, /, 2]

echo "\n------------------------------------------------------------------\n\n";

// Split a string into an array of characters
$string = 'Yutthana Siphuengchai';
print_r(preg_split('//', $string));
// Array
// (
//     [0] =>
//     [1] => Y
//     [2] => u
//     [3] => t
//     [4] => t
//     [5] => h
//     [6] => a
//     [7] => n
//     [8] => a
//     [9] =>
//     [10] => S
//     [11] => i
//     [12] => p
//     [13] => h
//     [14] => u
//     [15] => e
//     [16] => n
//     [17] => g
//     [18] => c
//     [19] => h
//     [20] => a
//     [21] => i
//     [22] =>
// )
