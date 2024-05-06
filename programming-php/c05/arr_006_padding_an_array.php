<?php

header('Content-Type: text/plain');

// To create an array with values initialized to the same content, use
// array_pad()
// $new_padded_array = array_pad($array, $minimum_number_of_elements, $value);
$scores = array(5, 0); // [5, 0]
$padded = array_pad($scores, 5, 0);
print_r($scores); // [5, 0]
print_r($padded); // [5, 0, 0, 0, 0]
// สังเกตว่า array_pad return array ตัวใหม่ออกมา ไม่ได้ไป mutate array ตัวเก่า

// If you want the new values added to the start of the array, use a negative
// second argument
$padded = array_pad($scores, -5, 0);
print_r($padded); // [0, 0, 0, 5, 0]

// If you pad an associative array, existing keys will be preserved.
// New elements will have numeric keys starting at 0
$aasoc = array('name' => 'Yut', 'age' => 34);
$padded = array_pad($aasoc, 5, 'xxx');
print_r($padded);
// Array
// (
//     [name] => Yut
//     [age] => 34
//     [0] => xxx
//     [1] => xxx
//     [2] => xxx
// )
