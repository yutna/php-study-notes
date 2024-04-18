<?php

function first()
{
    echo "This is the first function. <br />";
}

function second()
{
    echo "this is the second function. <br />";
}

function third()
{
    echo "This is the third function. <br />";
}

// ใช้ variable เก็บชื่อ function
$which = "first";

// ควรตรวจสอบว่ามีฟังก์ชั่นนั้นๆอยู่จริงไหมก่อนเรียกใช้ variable function
if (function_exists($which)) {
    $which();
}

// NOTE
// เราไม่ใช้สามารถทำแบบนี้กับ language constructs ได้ เช่น
// $my_print = "echo";
// $my_print("Test my print");
