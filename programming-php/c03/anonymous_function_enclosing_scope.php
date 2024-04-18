<?php

// $array = array(
//     'really long string here, boy',
//     'this',
//     'middling length',
//     'larger'
// );

// $sort_options = 'random';

// usort($array, function ($a, $b) use ($sort_options) {
//     if ($sort_options === 'random') {
//         return rand(0, 2) - 1;
//     }

//     return strlen($a) - strlen($b);
// });

// print_r($array);

// คำว่า enclosing scope ไม่ได้หมายถึง global scope นะ ลองดู comment ตัวอย่างข้างบนแล้ว
// uncomment อีกอันข้างล่างจะเข้าใจมากยิ่งขึ้น

$array = array(
    'really long string here, boy',
    'this',
    'middling length',
    'larger'
);

$sort_options = 'random';

function sort_no_random($array)
{
    $sort_options = false;

    usort($array, function ($a, $b) use ($sort_options) {
        if ($sort_options === 'random') {
            return rand(0, 2) - 1;
        }

        return strlen($a) - strlen($b);
    });

    print_r($array);
}

sort_no_random($array);

// NOTE
// จะเห็นว่าเรามี $sort_options ที่เป็น global scope กับ function scope
// เมื่อเราใช้ use ใน callback มันจะใช้ scope ที่ใกล้ที่สุด (enclosing scope) ซึ่งต่างจาการใช้งาน
// global ใน function
