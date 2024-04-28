<?php

header("Content-Type: text/plain");

// Finds the first occurance of a small string in a larger string
// $position = strpos(large_string, small_string);

$record = "Fred,Flintstone,35,Wilma";
$position = strpos($record, ",");
echo "The first comma in the record is at position {$position}\n";

// The strrpos() function finds the last occurance of a character in a string
$position = strrpos($record, ",");
echo "The last comma in the record is a position {$position}";
