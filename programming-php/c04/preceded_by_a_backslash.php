<?php

header("Content-Type: text/plain");

// NOTE:
// ในหนังสือพูดทำนองว่า เวลาใช้ SQL queries เราต้องทำการ escaped มันก่อน
// เพราะฉะนั้น SQL's encoding scheme is pretty simple โดยสามารถใช้ฟังก์ชั่นข้างบนได้

$string = <<<EOF
"It's never going to work, " she cried,
as she hit the backslash (\) key.
EOF;

$string = addslashes($string);
echo $string;
echo "\n";

echo stripslashes($string);
echo "\n";
