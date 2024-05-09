<?php

header('Content-Type: text/plain');

// To correctly sort strings that contain numbers, use the natsort() and
// natcasesort() functions

$file_names = array('ex10.php', 'ex5.php', 'ex1.php');
natsort($file_names);
print_r($file_names); // ['ex1.php', 'ex5.php', 'ex10.php']

echo "\n\n----------------------------------------------------------------\n\n";

$file_names = array('Ex10.php', 'ex5.php', 'EX1.php');
natcasesort($file_names);
print_r($file_names); // ['EX1.php', 'ex5.php', 'Ex10.php']

echo "\n\n----------------------------------------------------------------\n\n";

$person = array('name' => 'Fred1', 'age' => 35, 'friend' => 'Fred2');
natsort($person);
print_r($person); // สังเกตว่าถ้าลองใช้ associative array มันจะ sort เฉพาะ order
// Array
// (
//     [age] => 35
//     [name] => Fred1
//     [friend] => Fred2
// )
