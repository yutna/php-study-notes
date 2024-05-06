<?php

header('Content-Type: text/plain');

// The array_splice() function can remove or insert elements in an array and
// optionally create another array from the removed elements
// $removed = array_splice(array, start[, length [, replacement]]);
$subjects = array(
    'physics',
    'chem',
    'math',
    'bio',
    'cs',
    'drama',
    'classics'
);

$removed = array_splice($subjects, 2, 3);
print_r($removed); // ['math', 'bio', 'cs']
print_r($subjects); // ['physics', 'chem', 'drama', 'classics']

// If you omit the length, array_splice() removes to the end of the array
$subjects = array(
    'physics',
    'chem',
    'math',
    'bio',
    'cs',
    'drama',
    'classics'
);

$removed = array_splice($subjects, 2);
print_r($removed); // ['math', 'bio', 'cs', 'drama', 'classics']
print_r($subjects); // ['physics', 'chem']

// To insert elements where others were removed, use the fourth argument
$subjects = array(
    'physics',
    'chem',
    'math',
    'bio',
    'cs',
    'drama',
    'classics'
);

$new = array('law', 'business', 'IS');
$result = array_splice($subjects, 4, 3, $new);
print_r($result); // ['cs', 'drama', 'classics'] (removed 3 items)
print_r($subjects); // ['phycis', 'chem', 'bio', 'law', 'business', 'IS'] (inserted new array)

// To insert new elements into the array while pushing existing elements to the
// right, delete zero elements
$subjects = array('physics', 'chem', 'math');
$new = array('law', 'business');
$result = array_splice($subjects, 2, 0, $new);
print_r($result); // []
print_r($subjects); // ['physics', 'chem', 'law', 'business', 'math']

// Associative array example
$capitals = array(
    'USA' => 'Washington',
    'Great Britain' => 'London',
    'New Zealand' => 'Wellington',
    'Australia' => 'Canberra',
    'Italy' => 'Rome',
    'Canada' => 'Ottawa'
);

$down_under = array_splice($capitals, 2, 2); // Remove New Zealand and Australia
$france = array('France' => 'Paris');
array_splice($capitals, 1, 0, $france);
print_r($down_under); // ['New Zealand' => 'Wellington', 'Australia' => 'Canberra']
print_r($capitals);
// Array
// (
//     [USA] => Washington
//     [0] => Paris 🤔🤯 ได้ key 0 เฉย
//     [Great Britain] => London
//     [Italy] => Rome
//     [Canada] => Ottawa
// )
