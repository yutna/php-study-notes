<?php

header("Content-Type: text/plain");

// The strstr() function finds the first occurance of a small string in a larger
// string and returns from that small string on.

$record = "Fred,Flintstone,35,Wilma";
$rest = strstr($record, ",");
echo $rest . "\n"; // ,Flintstone,35,Wilma

// The variable of strstr() are:
// stristr() - Case-insensitive strstr()
// strchr() - Alias for strstr()
// strrchr() - Finds last occurance of a character in a string

$rest = stristr($record, "RED");
echo $rest . "\n"; // red,Flintstone,35,Wilma

$rest = strchr($record, "ed");
echo $rest . "\n"; // ed,Flintstone,35,Wilma

$rest = strrchr($record, "F");
echo $rest . "\n"; // Flintstone,35,Wilma
