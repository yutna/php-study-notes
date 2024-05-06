<?php

header('Content-Type: text/plain');

// The `count()` and `sizeof()` functions are identical in use and effect.
// จะใช้ตัวไหนก็ได้ไม่ได้มีข้อกำหนดตายตัวว่าคนส่วนใหญ่ชอบใช้ตัวไหนมากกว่ากัน
$family = array('Fred', 'Wilma', 'Pebbles');
$size = count($family);
echo $size; // 3

echo "\n";

$confusion = array(10 => 'ten', 11 => 'eleven', 12 => 'twelve');
$size = sizeof($confusion);
echo $size; // 3
