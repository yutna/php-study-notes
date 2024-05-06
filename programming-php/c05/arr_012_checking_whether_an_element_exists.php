<?php

header('Content-Type: text/plain');

// To see if an element exists in the array, use the `array_key_exists()`
// if (array_key_exists($key, $array)) { .. }
// ในหนังสือบอกว่าทำไมเราไม่ควรใช้ท่านี้
// if ($person['name']) { .. }
// เพราะว่า $person['name'] อาจจะมี value เป็น '', NULL, false, 0 ได้ทำให้นิพจน์เกิดการ
// misleading ได้ ให้ใช้ array_key_exists() นี่แหละตรงไปตรงมาสุด

$person['age'] = 0;

if ($person['age']) {
    echo "true!\n"; // this will not print
}

if (array_key_exists('age', $person)) {
    echo "exists!\n"; // print exists!
}

// NOTE: many people use the isset() function instead, which returns true if
// the element exists and is NOT NULL;

$a = array(0, NULL, '');

function tf($v)
{
    return $v ? 'T' : 'F';
}

for ($i = 0; $i < 4; $i++) {
    printf("%d: %s %s\n", $i, tf(isset($a[$i])), tf(array_key_exists($i, $a)));
}

// 0: T T
// 1: F T // ถ้า value เป็น NULL isset จะได้ค่า false
// 2: T T
// 3: F F

// ถ้าเรามีเจตนาจะเช็คว่า element นั้นมีหรือเปล่าโดยไม่สนใจ value ให้ใช้ array_key_exists() ดีที่สุด
