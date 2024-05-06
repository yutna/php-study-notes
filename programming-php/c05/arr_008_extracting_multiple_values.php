<?php

header('Content-Type: text/plain');

// To copy all of an array's values into variables, use the `list()` construct
// list($var, ...) = $array;
$person = array('Fred', 35, 'Betty');
list($name, $age, $wife) = $person;
echo $name . ', ' . $age . ', ' . $wife . "\n";
unset($name, $age, $wife);

// If you have more values in the array than in the `list()`, the extra values
// are ignored
list($name, $age) = $person;
echo $name . ', ' . $age . "\n"; // ลองเพิ่ม $wife เข้าไปมันจะเตือนว่าไม่มี variable นี้
unset($name, $age);

// If you have more values in the `list()` than in the array, the extra values
// are set to NULL
$values = array('hello', 'world');
list($a, $b, $c) = $values;
var_dump($a); // hello
var_dump($b); // world
var_dump($c); // NULL

// Two or more consecutive commas in the list() skip values in the array
$values = range('a', 'e'); // ['a', 'b', 'c', 'd', 'e']
list($m,, $n,, $o) = $values; // $m = 'a', $n = 'c', $o = 'e'
var_dump($m);
var_dump($n);
var_dump($o);
