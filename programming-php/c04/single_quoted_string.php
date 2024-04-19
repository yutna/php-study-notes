<?php

$name = 'Fred';
$str = 'Hello, $name'; // Single quoted string DO NOT interpolate variables.

echo $str;

echo "<br />------------------------------------------------------------<br />";

$name = 'Tim O\'Reilly';
echo $name . "<br />";

$path = 'C:\\WINDOWS';
echo $path . "<br />";

$nope = '\n';
echo $nope;

// NOTE:
// Single quoted string only support two escape sequences:
// 1) \'
// 2) \\
