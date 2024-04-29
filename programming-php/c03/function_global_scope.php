<?php

$a = 3;
$b = 2;

function foo()
{
    global $a, $b;

    $a = $a + $b;
}

foo();
echo $a; // 5

echo "<br />------------------------------------<br />";

$var = 10;

function bar()
{
    $var = &$GLOBALS['var']; // This equivalent to `global $var`;
    $var += 2;
}

bar();
echo $var; // 12
