<?php

header('Content-Type: text/plain');

// PHP provides three ways to sort arrays
// 1) sorting by keys
// 2) sorting by values without changing the keys
// 3) sorting by values and then changing the keys
// Each kind of sort can be done in ASC, DESC or an order determinded by a user
// defined function.

// Sorting one array at a time
// ASC, DESC, User-defined order (ตามลำดับดังนี้)
// ksort(), krsort(), uksort() -> Sort array by keys
// asort(), arsort(), uasort() -> Sort array by values
// sort(), rsort(), usort() -> Sort array by values, then reassign indices starting with 0

// The sort(), rsort(), and usrot() functions are designed to work on indexed
// arrays because they assign new numeric keys to represent the ordering.

// The other sort functions can be used on indexed arrays, but you will only
// be able to access the sorted ordering by using traversal constructs such as
// `foreach` and `next()`

$names = array('Cath', 'Angela', 'Brad', 'Mira');
sort($names);
print_r($names); // ['Angela', 'Brad', 'Cath', 'Mira']

echo "\n\n----------------------------------------------------------------\n\n";

$names = array('Cath', 'Angela', 'Brad', 'Mira');
rsort($names);
print_r($names); // ['Mira', 'Cath', 'Brad', 'Angela']

echo "\n\n----------------------------------------------------------------\n\n";

$person = array('name' => 'Fred', 'age' => 35, 'wife' => 'Betty');
sort($person);
print_r($person); // [35, 'Betty', 'Fred'] (สังเกตถ้าเราใช้ associative array ใส่ sort ปกติ ตัว array จะเปลี่ยนเป็นแบบ indexed แบบที่เขียนบอกไว้ข้างบน)

echo "\n\n----------------------------------------------------------------\n\n";

// Example
// If you have an associative array that maps username and minutes of login
// time, you can use arsort() to display the most longest login user.

$logins = array(
    'njt' => 415,
    'kt' => 492,
    'rl' => 652,
    'jht' => 441,
    'jj' => 441,
    'wt' => 402,
    'hut' => 309
);

arsort($logins);
print_r($logins);
// Array
// (
//     [rl] => 652
//     [kt] => 492
//     [jht] => 441
//     [jj] => 441
//     [njt] => 415
//     [wt] => 402
//     [hut] => 309
// )

echo "\n\n----------------------------------------------------------------\n\n";

// If you want to displayed in ascending order by username, use ksort()
$logins = array(
    'njt' => 415,
    'kt' => 492,
    'rl' => 652,
    'jht' => 441,
    'jj' => 441,
    'wt' => 402,
    'hut' => 309
);

ksort($logins);
print_r($logins);
// Array
// (
//     [hut] => 309
//     [jht] => 441
//     [jj] => 441
//     [kt] => 492
//     [njt] => 415
//     [rl] => 652
//     [wt] => 402
// )

// สำหรับตัวอย่าง user-defined sort ให้ดูไฟล์ถัดไป
// arr_024_user_defined_sort.php
