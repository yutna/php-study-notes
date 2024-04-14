<?php

$a = 3.1428;
$b = 3.1428;

// NOTE: เท่าที่เข้าใจคือเวลาเรา compare floate เราไม่สามารถใช้ == โดยตรงได้เพราะ
// float value ถือว่าเป็น value ที่ไม่ accurate
// ให้เราใช้วิธีข้างล่างโดยการคูนฐาน 10 ให้เลขทศนิยมไม่มี แล้วทำการเทียบในรูปของ int value แทน

var_dump($a * 100000);
var_dump($b * 100000);

if (intval($a * 100000) == intval($b * 100000)) {
    echo "$a, $b";
} else {
    echo "not equal";
}
