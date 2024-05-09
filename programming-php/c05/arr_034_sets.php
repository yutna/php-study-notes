<?php

header('Content-Type: text/plain');

function array_union($a, $b)
{
    $union = array_merge($a, $b);
    $union = array_unique($union);

    return $union;
}

$first = array(1, 'two', 3);
$second = array('two', 'three', 'four');

$union = array_union($first, $second);
print_r($union);

// Array
// (
//     [0] => 1
//     [1] => two
//     [2] => 3
//     [4] => three
//     [5] => four
// )

echo "\n\n----------------------------------------------------------------\n\n";

$intersection = array_intersect($first, $second);
print_r($intersection);
// Array
// (
//     [1] => two
// )
