<?php

header('Content-Type: text/plain');

// The `array_sum()` function adds up the values in an indexed or associative
// array

// $sum = array_sum(array);

$scores = array(98, 76, 56, 80);
$total = array_sum($scores);
print($total); // 310
