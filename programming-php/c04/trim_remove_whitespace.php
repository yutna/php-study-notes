<?php

header('Content-Type: text/plain');

$title = " Programming PHP \n";
$str1 = ltrim($title); // "Programming PHP \n"
$str2 = rtrim($title); // " Programming PHP";
$str3 = trim($title); // "Programming PHP";

echo $str1;
echo $str2;
echo "\n";
echo $str3;
echo "\n";

// NOTE
// Default characters removed by trim(), ltrim(), rtrim()
// " " Space
// "\t" Tab
// "\n" Newline
// "\r" Carriage return
// "\0" NULL-byte
// "\x0B" Vertical tab

// you can use optional charlist argument to remove leading or trailing
// whitespace without deleting the tabs:

$record = " Fred\tFlintstone\t35\tWilma\t \n";
$record = trim($record, " \r\n\0\x0B");
echo $record;
