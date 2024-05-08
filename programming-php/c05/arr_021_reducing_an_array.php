<?php

header('Content-Type: text/plain');

// array_reduce() applies a function to each element of the array in turn,
// to build a single value
// $result = array_reduce(array, callable [, initial_value]);
// The function takes two arguments:
// 1) the running total
// 2) the current value being processed.
// It should return the new running total

$add_it_up = function ($running_total, $current_value) {
    $running_total += $current_value * $current_value;
    return $running_total;
};

$numbers = [2, 3, 5, 7];
echo array_reduce($numbers, $add_it_up, 11);

echo "\n\n----------------------------------------------------------------\n\n";

// If array is empty and has initial value, return initial value
echo array_reduce([], $add_it_up, 1); // 1

echo "\n\n----------------------------------------------------------------\n\n";

// If array is empty and no initial value, return NULL
var_dump(array_reduce([], $add_it_up)); // NULL
