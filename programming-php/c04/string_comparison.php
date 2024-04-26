<?php

header('Content-Type: text/plain');

// In PHP, there are 2 opertors and six functions for string comparisons
// Operators:
// 1) ==
// 2) ===
// Functions:
// 1) strcmp()
// 2) strcasecmp()
// 3) strncmp()
// 4) strncasecmp()
// 5) strnatcmp()
// 6) strnatecasecmp()

$o1 = 3;
$o2 = "3";

if ($o1 == $o2) {
    echo "$o1 == \"$o2\" returns true\n";
}

if (!($o1 === $o2)) {
    echo "$o1 === \"$o2\" returns false\n";
}

// The comparison operators (>, >=, <, <=) also work on strings
// If you use comparison operators between string and number, you will get
// unpexted results. I recommened to use string compare function instead.

$him = "Fred";
$her = "Wilma";

if ($him < $her) {
    echo "{$him} comes before {$her} in the alphabet.\n";
}

// NOTE:
// To explicitly compare two strings as strings, casting numbers to strings if
// necessary, use the strcmp() function.

$string = "PHP Rock";
$number = 5;

echo strcmp($string, $number) . "\n"; // 1

// สำหรับฟังก์ชั่นที่มีคำว่า case อยู่ ตัว function จะทำการ convert เป็น lower case ก่อนทำการ
// compare

echo strcasecmp("Fred", "frED") . "\n"; // 0;

// เราสามารถเลือกที่จะ compare โดยระบุ length ได้ว่าเราจะ compare ไปถึงตัวอักษรไหน เช่น
echo strncmp("abc", "acd", 2) . "\n"; // -1
echo strncasecmp("ABC", "AcD", 2) . "\n"; // -1

// การ compare string มีสองแบบ คือ
// 1) ASCII order
// 2) Natural order
// ตัวอย่างข้างบนที่ผ่านมาคือ ASCII order
// สำหรับ Natural order จะ compare string กับ number แยกจากกัน
// เช่น เรามีคำว่า
$ascii_order = ['pic1.jpg', 'pic50.jpg', 'pic10.jpg', 'pic5.jpg'];
$natural_order = ['pic1.jpg', 'pic50.jpg', 'pic10.jpg', 'pic5.jpg'];
// เราใช้ usort (user-defined sort) function ในการ sort ให้เห็นภาพทั้งสองแบบ

usort($ascii_order, function ($a, $b) {
    return strcmp($a, $b);
});

usort($natural_order, function ($a, $b) {
    return strnatcmp($a, $b);
});

echo implode(', ', $ascii_order); // pic1.jpg, pic10.jpg, pic5.jpg, pic50.jpg
echo "\n";
echo implode(', ', $natural_order); // pic1.jpg, pic5.jpg, pic10.jpg, pic50.jpg

// สังเกตตัวเลขข้างหลังของแต่ละผลลัพธ์
