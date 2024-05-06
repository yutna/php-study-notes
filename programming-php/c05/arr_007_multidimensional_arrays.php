<?php

header('Content-Type: text/plain');

$row0 = array(1, 2, 3);
$row1 = array(4, 5, 6);
$row2 = array(7, 8, 9);
$multi = array($row0, $row1, $row2);
print_r($multi);
// Array
// (
//     [0] => Array
//         (
//             [0] => 1
//             [1] => 2
//             [2] => 3
//         )
//     [1] => Array
//         (
//             [0] => 4
//             [1] => 5
//             [2] => 6
//         )
//     [2] => Array
//         (
//             [0] => 7
//             [1] => 8
//             [2] => 9
//         )
// )

$value = $multi[2][0];
print($value); // 7

// ถ้าเราต้องการเอาค่าของ multidimensianl array ไปแสดงใน string (interpolate) ให้เราใส่
// {} ครอบด้วย
echo "The value at row 2, column 0 is {$multi[2][0]}";
