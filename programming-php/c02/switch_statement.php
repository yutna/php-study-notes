<?php

// การใช้ switch ใน PHP ก็เหมือนในภาษาทั่วๆไป
// ในไฟล์นี้จะแสดงตัวอย่างการใช้ switch ด้วย :

switch ($name):
    case 'Yutthana':
    case 'Yutna':
        echo "Yes!";
        break;
    default:
        echo "No!";
        break;
endswitch;
