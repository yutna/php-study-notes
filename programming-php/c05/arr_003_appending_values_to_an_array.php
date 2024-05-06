<?php

header('Content-Type: text/plain');

// To add more values to `the end` of an existing indexed array,
// use the [] syntax
$family = array('Fred', 'Wilma');
$family[] = "Pebbles";
print_r($family);
// Array
// (
//     [0] => Fred
//     [1] => Wilma
//     [2] => Pebbles
// )

// NOTE: Attempting to append to an assiciative array without appropriate keys
// is almost always a programming `mistake`, but PHP will give the new elements
// numeric indices without issuing a warning 🤔🤯
$person = array('name' => 'Fred');
$person[] = 'Wilma';
print_r($person);
// Array
// (
//     [name] => Fred
//     [0] => Wilma
// )

// ลองใช้แบบกำหนด index เริ่มต้นเองสิว่าจะเป็นยังไง 🤔
$days = array(1 => 'Mon', 'Tue', 'Wed');
$days[] = 'Thu';
$days[] = 'Fri';
print_r($days);
// Array
// (
//     [1] => Mon
//     [2] => Tue
//     [3] => Wed
//     [4] => Thu
//     [5] => Fri
// )
