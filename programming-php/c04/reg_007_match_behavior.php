<?php

header("Content-Type: text/plain");

// (.) ใช้ match ทุกตัวอักษรยกเว้น new line (\n)
// $ ใช้ match ท้าย string ถ้า string จบด้วย new line มันจะ match string ก่อน new line

var_dump(preg_match("/is (.*)$/", "the key is in my pants", $captured)); // true (1)
var_dump($captured);
// array(2) {
//     [0]=> string(14) "is in my pants"
//     [1]=> string(11) "in my pants"
// }
