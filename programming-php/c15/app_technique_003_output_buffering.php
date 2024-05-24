<?php

ob_start();
phpinfo();
$phpinfo = ob_get_contents();
ob_end_flush();

if (strpos($phpinfo, "module_gd") === false) {
    echo "You do NOT have GD Graphics support in your PHP, sorry.";
} else {
    echo "Congratulations, you have GD Graphics support!";
}

// RECHECK: เนื้อหาเต็มๆลองกลับไปอ่านในหนังสือดู ถ้าจะใช้จริงๆมีหลายฟังก์ชั่นต้องกลับไปอ่าน
// แต่คิดว่าในชีวิตจริงอาจจะไม่ค่อยได้ใช้เท่าไหร่ ยิ่งถ้าใช้ framework ด้วยแล้วเราอาจจะไม่จำเป็นต้องมา handle
// ตรงนี้เลย
