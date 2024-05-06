<?php

header('Content-Type: text/plain');

// To divide an array into smaller, evenly(เท่าๆกัน) sized array, use the
// `array_chunk()` function
// $chunks = array_chunk($array, $size [, preserve_keys]);
// The function returns an array of smaller arrays.
// The `perserve_keys` is a `boolean` value that determines whether the
// elements of the new arrays have the same keys as in the original.

$nums = range(1, 7);
$rows = array_chunk($nums, 3);
print_r($rows); // [[1, 2, 3], [4, 5, 6], [7]]

// when preserve_keys === false
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
//         )
// )

// when preserve_keys === true
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
//             [3] => 4
//             [4] => 5
//             [5] => 6
//         )
//     [2] => Array
//         (
//             [6] => 7
//         )
// )

$info = array(
    'name' => 'Yut',
    'age' => 34,
    'nickname' => 'Na',
    'occupation' => 'Web programmer',
    'country' => 'Thailand',
    'city' => 'Phetchabun'
);

$chunks = array_chunk($info, 2);
print_r($chunks); // [['Yut', 34], ['Na', 'Web programmer'], ['Thailand', 'Phetchabun']]
// when preserve_keys === false
// Array
// (
//     [0] => Array
//         (
//             [0] => Yut
//             [1] => 34
//         )
//     [1] => Array
//         (
//             [0] => Na
//             [1] => Web programmer
//         )
//     [2] => Array
//         (
//             [0] => Thailand
//             [1] => Phetchabun
//         )
// )

// when preserve_keys === true
// Array
// (
//     [0] => Array
//         (
//             [name] => Yut
//             [age] => 34
//         )
//     [1] => Array
//         (
//             [nickname] => Na
//             [occupation] => Web programmer
//         )

//     [2] => Array
//         (
//             [country] => Thailand
//             [city] => Phetchabun
//         )
// )
// ถ้าเขียนให้เข้าใจง่าย
// [
//     ['name' => 'Yut', 'age' => 34],
//     ['nickname' => 'Na', 'occupation' => 'Web programmer'],
//     ['country' => 'Thailand', 'city' => 'Phetchabun']
// ]
