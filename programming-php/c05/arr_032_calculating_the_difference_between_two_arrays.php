<?php

header('Content-Type: text/plain');

// The `array_diff()` function calculates the difference between two or more
// arrays, returning an array with values from the first array that are not
// present in the others

// $diff = array_diff(array1, array2 [, array3...]);

// Values are compared using the strict comparison operator ===, so 1 and "1"
// are considered different. The keys of the first array are preserved, so in
// `$diff` the key of `bill` is 0 and the key of `judy` is 4.

$a1 = array('bill', 'claire', 'ella', 'simon', 'judy');
$a2 = array('jack', 'claire', 'toni');
$a3 = array('ella', 'simon', 'garfunkel');

$diff = array_diff($a1, $a2, $a3);
print_r($diff); // ['bill', 'judy']
// Array
// (
//     [0] => bill
//     [4] => judy
// )

$first = array(1, 'two', 3);
$second = array('two', 'three', 'four');
$diff = array_diff($first, $second);
print_r($diff);
// Array
// (
//     [0] => 1
//     [2] => 3
// )
