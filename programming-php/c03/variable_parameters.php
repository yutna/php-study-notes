<?php

function count_list()
{
    if (func_num_args() === 0) {
        return false;
    }

    var_dump(func_get_args());
    echo "<br />";

    $count = 0;

    for ($i = 0; $i < func_num_args(); $i++) {
        $count += func_get_arg($i);
    }

    return $count;
}

echo count_list(1, 5, 9); // 15

// NOTE:
// Variable parameters คือ การประกาศฟังก์ชั่นโดยที่ไม่ได้ระบุ parameters ไว้ แต่เวลาเรียกใช้ฟังก์ชั่น
// เราสามารถ pass arguments เข้ามาในฟังก์ชั่นนั้นกี่ตัวก็ได้
// โดย PHP จัดเตรียม function ที่เอาไว้เรียกดู arguments ที่ pass เข้ามาดังนี้
// 1. func_get_args() => return array of arguments
// 2. func_get_arg($index) => return an argument value
// 3. func_num_args() => return number of arguments
//
// หมายเหตุ ถ้าเราต้องการเรียกฟังก์ชั่นทั้งสามข้างบนเพื่อไปเป็น argument ของ function อื่นจะไม่สามารถเรียก
// ตรงๆได้ ต้องเอาไปใส่ตัวแปลก่อน เช่น
// foo(func_num_args()) แบบนี้ผิด
// ที่ถูกคือ
// $num = func_num_args()
// foo($num)

// จากที่ทดลองในตัวอย่างข้างล่างมันก็เรียกได้นะ แต่ในหนังสือเขียนไว้แบบนั้น งง เหมือนกัน

echo "<br />";

function print_args_count($args_count)
{
    echo $args_count;
}

function test_print_args_count()
{
    print_args_count(func_num_args());
}

test_print_args_count(1, 2, 3, 4, 5, 6);
