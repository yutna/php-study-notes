<?php

// 1 - Nested declaration DO NOT limit the visibility
// 2 - inner-defined function may be called from ANYWHARE in your program
// 3 - The inner function DOES NOT automatically get the outer function's arguments
// 4 - The inner function CANNOT be called until the outer function has been called
// 5 - The inner function CANNOT be called from code parsed after the outer function.

function outer($a)
{
    function inner($b)
    {
        echo "there $b <br>";
    }

    echo "$a, hello ";
}

outer("well");
inner("reader");

// สำหรับข้อ 5 ในความเข้าใจคือ PHP เมื่อเราเรียก outer และ inner ไปแล้ว ตัว PHP ได้ parsed โค๊ดเหล่านั้นเรียบร้อยแล้ว
// ทำให้เราไม่สามารถเรียกมันซ้ำได้อีก
// ลอง uncomment ดูถ้าเราเรียก outer อีกครั้ง มันจะ error -> Cannot redeclare inner() function
// outer("xxx");

// ลองค้นเกี่ยวกับ Nested Function เจอวิดีโอสอนใน YouTube เค้าสรุปให้ฟังสั้นๆว่า พยายามอย่าใช้หรือเขียน nested function เลย
// ซึ่งรู้สึกว่าเห็นด้วย รู้สึกว่าการที่เราสามารถเรียก inner function ได้แบบตัวอย่างมันดูแปลกเมื่อเทียบกับภาษาอื่นๆ
