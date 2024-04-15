<?php

// casting มี (int), (float), (string), (bool), (object), (array)
// ในหนังสือมี (unset) แต่มัน depecrated ไปแล้ว ใช้ไม่ได้

class Person
{
    var $name = "Fred";
    var $age = 35;
}

$p = new Person();
$a = (array) $p;
var_dump($a); // array(2) { ["name"]=> string(4) "Fred" ["age"]=> int(35) }

echo "<br />";

$a = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');
$obj = (object) $a;
echo $obj->name; // สร้าง object พร้อมเรียก properties จาก array 🤯
