<?php

header('Content-Type: text/plain');

define('NAME', 'bob');
$person = array('name' => 'Peter');

echo "Hello, {$person['name']}";
echo "\n";
echo "Hello, NAME";
echo "\n";
echo NAME;

// NOTE:
// $array['3'] เท่ากับ $array[3] ถ้าเป็นตัวเลข (ต้องไม่มีศูนย์นำหน้า เช่น $array['03'] จะถือว่าไม่ใช่ indexed array แล้ว)
