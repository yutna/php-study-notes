<?php

header("Content-Type: text/plain");

$name = "Fred Filintstone";
echo substr($name, 6, 4) . "\n"; // ilin
echo substr($name, 11) . "\n"; // stone

// How many times a smaller string occurs within a larger one?
// use substr_count();
$sketch = <<<ENDOFSKETCH
Well, there's egg and bacon; egg sausage and bacon; egg and spam;
egg bacon and spam; egg bacon sausage and spam; spam bacon sausage
and spam; spam egg spam spam bacon and spam; spam sausage spam spam
bacon spam tomato and spam;
ENDOFSKETCH;

$count = substr_count($sketch, "spam"); // 14
echo "The word spam occurs {$count} times." . "\n";

// Replace string
$greeting = "good morning citizen";
$farewell = substr_replace($greeting, "bye", 5, 7);
echo $farewell . "\n"; // good bye citizen

// Use a length 0 to insert without deleteing
$farewell = substr_replace($farewell, "kind ", 9, 0);
echo $farewell . "\n"; // good bye kind citizen

// Use a replacement of "" to delete without inserting
$farewell = substr_replace($farewell, "", 8);
echo $farewell . "\n"; // good bye

// Insert at the beginning of the string
$farewell = substr_replace($farewell, "now it's time to say ", 0, 0);
echo $farewell . "\n"; // now it's time to say good bye

// A negative value for `start` indicates the number of characters from
// the end of the string
$farewell = substr_replace($farewell, "riddance", -3);
echo $farewell . "\n"; // now it's time to say good riddance

// A negative `length` indicates the number of characters from the end of the
// string at which to stop deleting
$farewell = substr_replace($farewell, "", -8, -5); // now it's time to say good dance
echo $farewell . "\n";

// Experiment by yourself 😁
$sample = "0123456789 123456789";
echo $sample . "\n";
echo substr_replace($sample, "x", -3, -3);
