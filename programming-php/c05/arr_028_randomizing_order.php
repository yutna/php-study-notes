<?php

header('Content-Type: text/plain');

// To traverse the elements in an array in random order, use the `shuffle()`
// function.
// It replaces all existing keys-string or numeric-with consecutive integers
// starting with 0

$weekdays = array('Monday', 'Tuesdays', 'Wednesday', 'Thursday', 'Friday');
shuffle($weekdays);
print_r($weekdays);
// Array
// (
//     [0] => Friday
//     [1] => Thursday
//     [2] => Tuesdays
//     [3] => Wednesday
//     [4] => Monday
// )

$person = array('name' => 'Fred', 'age' => 35, 'wife' => 'Betty');
shuffle($person);
print_r($person);
// Array
// (
//     [0] => Fred
//     [1] => Betty
//     [2] => 35
// )
