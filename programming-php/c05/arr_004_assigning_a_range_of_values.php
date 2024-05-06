<?php

header('Content-Type: text/plain');

$numbers = range(2, 5);
print_r($numbers); // [2, 3, 4, 5];

$letters = range('a', 'z');
print_r($letters); // ['a', 'b', 'c', ..., 'z'];

$reversed_number = range(5, 2);
print_r($reversed_number); // [5, 4, 3, 2];

// Only the first letter of a string argument is used to build the range
$letters = range('aaa', 'zzz');
print_r($letters); // ['a', 'b', 'c', ..., 'z'];
// ถ้าใช้แบบข้างบนมันจะเตือนว่า
// range(): Argument #1 ($start) must be a single byte, subsequent bytes are ignored
