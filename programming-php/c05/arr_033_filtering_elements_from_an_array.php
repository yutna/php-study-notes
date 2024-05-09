<?php

header('Content-Type: text/plain');

// To identify a subset of an array based on its values, use the
// `array_filter()` function

// $filtered = array_filter(array, callback);

// Each value of array is passed to the function named in callback. The returned
// array contains only those elements of the original array for which the
// function returns a true value.

function is_odd($element)
{
    return $element % 2;
}

$numbers = array(9, 23, 24, 27);
$odds = array_filter($numbers, 'is_odd');
print_r($odds);
// Array
// (
//     [0] => 9
//     [1] => 23
//     [3] => 27
// )

// NOTE: the keys are preserved. This function is mose useful with associative
// arrays.
