<?php

header('Content-Type: text/plain');

$a = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');
print_r($a);
echo "\n";

class P
{
    var $name = 'Nat';
}

$p = new P;
print_r($p);
echo "\n";

print_r(true); // 1
echo "\n";
print_r(false); // ""
echo "\n";
print_r(null); // ""
echo "\n";
