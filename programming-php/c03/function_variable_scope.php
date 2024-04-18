<?php

$a = 3;

function foo()
{
    $a = 2;
}

foo();
echo $a;

// $a ใน function มี scope แค่ใน function
// variable ที่ประกาศนอก function โดยปกติแล้วจะไม่สามารถ access ได้เหมือนอย่าง JavaScript
// มีเพียง SUPER GLOBAL variables ที่ PHP built-in มาให้เท่านั้นที่สามารถใช้ได้ทั้ง
// Global scope และ function and object scopes
