<?php

// เหมือนการใช้ while loop ในภาษาอื่นๆ
// ในไฟล์นี้จะแสดงตัวอย่างการใช้ while loop with : (colon)

$total = 0;
$i = 1;

while ($i <= 10) :
    $total += $i;
    $i++;
endwhile;

echo $total . "<br />";
echo "-------------------------------------------------<br />";

// While loop with break;

$total = 0;
$i = 1;

while ($i <= 10) {
    if ($i === 5) {
        break;
    }

    $total += $i;
    $i++;
}

echo $total . "<br />";
echo $i . "<br />";
