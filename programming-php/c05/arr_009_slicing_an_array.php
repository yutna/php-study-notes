<?php

header('Content-Type: text/plain');

// To extract only a subset of the array, use the `array_slice()` function
// $subset = array_slice($array, offset, length);
// The `offset` parameter indentifies the initial element to copy, 0 represents
// the first element in the array
// The `length` parameter indentifies the number of values to copy

$people = array('Tom', 'Dick', 'Harriet', 'Brenda', 'Jo');
$middle = array_slice($people, 2, 2);
print_r($middle); // ['Harriet', 'Brenda']

// ฟังก์ชั่น array_slice() เหมาะกับ array indexed มากกว่า ในหนังสือบอกว่าเอาไปใช้กับ
// associative array มันดูไม่ค่อย make sense เท่าไหร่
// $person = array('name' => 'Fred', 'age' => 35, 'wife' => 'Betty');
// $subset = array_slice($person, 1, 2);
// print_r($subset); // [35, 'Betty']

// Combine array_slice() with list()
$order = array('Tom', 'Dick', 'Harriet', 'Brenda', 'Jo');
list($second, $third) = array_slice($order, 1, 2);
var_dump($second);
var_dump($third);
