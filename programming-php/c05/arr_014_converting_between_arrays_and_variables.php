<?php

header('Content-Type: text/plain');

$person = array('name' => 'Fred', 'age' => 35, 'wife' => 'Betty');

// Creating variables from an array
// The extract() function automatically creates local variables from an array.
extract($person); // $name, $age, and $wife are now set
var_dump($name); // Fred
var_dump($age); // 35
var_dump($wife); // Betty

// It is good PHP style to always use EXTR_PREFIX_ALL. This help ensure that
// you create unique variable names when you use extract().
$shape = 'round';
$array = array('cover' => 'bird', 'shape' => 'rectangular');
extract($array, EXTR_PREFIX_ALL, 'book');
echo "Cover: {$book_cover}, Book Shape: {$book_shape}, Shape: {$shape}\n";

echo "\n\n----------------------------------------------------------------\n\n";

// Creating an Array from variables
// The compact() function creates an associative array whose keys are the
// variable names and whose values are the variable's values.
// Any names in the array that do NOT correspond to actual variable are skipped.

$color = 'indigo';
$shape = 'curvy';
$floppy = 'none';

$a = compact('color', 'shape', 'floppy');
print_r($a); // ['color' => 'indigo', 'shape' => 'curvy', 'floppy' => 'none']

// or

$names = array('color', 'shape', 'floppy');
$a = compact($names);
print_r($a); // // ['color' => 'indigo', 'shape' => 'curvy', 'floppy' => 'none']
