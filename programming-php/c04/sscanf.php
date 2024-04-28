<?php

header("Content-Type: text/plain");

// The sscanf() function decomposes a string according to a printf()-like template.
// $array = sscanf($string, template);
// $count = sscanf($string, template, $var1, $var2, ...$varn);

$string = "Fred\tFlintstone (35)";
$array = sscanf($string, "%s\t%s (%d)");
print_r($array); // ["Fred", "Flintstone", 35]
echo "\n";

// Pass references
$count = sscanf($string, "%s\t%s (%d)", $first_name, $last_name, $age);
echo "Matched {$count} fields: {$first_name} {$last_name} is {$age} years old.";
