<?php

header("Content-Type: text/plain");

// $array = explode(separator, string [, limit]);
$input = "Fred,25,Wilma";
$fields = explode(",", $input);
print_r($fields); // ["Fred", 25, "Wilma"]
echo "\n";

$fields = explode(",", $input, 2);
print_r($fields); // ["Fred", "25,Wilma"]
echo "\n";
