<?php

// Syntax ปกติเหมือนภาษาทั่วไป
// ในไฟล์นี้จะยกเฉพาะตัวอย่างการใช้ if ด้วย : แทนที่จะใช้ {}
// ซึ่งมันดูกระชับกว่ามากเวลาไปเขียนร่วมกับ HTML

// if ($user_validated) :
//     echo "Welcome!";
//     $greeted = 1;
// else :
//     echo "Access Forbidden!";
//     exit;
// endif;

if ($good) :
    print("Dandy!");
elseif ($error) : // สังเกตใน PHP ตัว elseif จะเขียนติดกัน
    print("Oh, no!");
else :
    print("I'm ambivalent...");
endif;

echo "<br />";

// ส่วน Ternary conditional operator ก็เขียนเหมือนภาษาทั่วๆไป
echo $active ? "Yes" : "No";
