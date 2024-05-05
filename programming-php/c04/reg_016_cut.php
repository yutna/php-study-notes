<?php

header('Content-Type: text/plain');

// $pattern = '/(a+|b+)*\.+$/'; // without cut
$pattern = '/(?>a+|b+)*\.+$/'; // with cut
$string = 'abababaaabaaaabbbababababababababaaababababababaabababababab..!';

if (preg_match($pattern, $string)) {
    echo 'Y';
} else {
    echo 'N';
}

// RECHECK: ไม่ค่อยเข้าใจเท่าไหร่ เหมือนเราต้องรู้ว่า regexp engine ทำงานยังไง
// แต่มีข้อสังเกตว่า ถ้า regexp มันทำงานช้ากว่าจะให้ผลลัพธ์ลองใช้ cut ดู
// แต่ในหนังสือก็บอกว่ามันเป็น rarely used เหมือนกัน
