<?php

header("Content-Type: text/plain");

// To specify a set of acceptable characters in your patterns, you can either
// build a character class yourself or use a predefined one.

// Build your own character class by enclosing the acceptable characters in []
$pattern = "/c[aeiou]t/";
var_dump(preg_match($pattern, "I cut my hand")); // true (1)
var_dump(preg_match($pattern, "This crusty cat")); // true (1)
var_dump(preg_match($pattern, "What cart?")); // false (0)
var_dump(preg_match($pattern, "14ct gold")); // false (0)

echo "----------------------------------------------------------------------\n";

// Negate a character class with ^
// It is looking for a `c` followed by a character class that is NOT a vowel,
// followed by `t`
$pattern = "/c[^aeiou]t/";
var_dump(preg_match($pattern, "I cut my hand")); // false (0)
var_dump(preg_match($pattern, "Reboot chthon")); // true (1)
var_dump(preg_match($pattern, "14ct gold")); // false (0)

echo "----------------------------------------------------------------------\n";

// You can define a range of characters with a hyphen (-). This simplifies
// character classes like "all letters" and "all digits"
var_dump(preg_match("/[0-9]%/", "we are 25% complete")); // true (1)
var_dump(preg_match("/[0123456789]%/", "we are 20% complate")); // true (1)
var_dump(preg_match("/[a-z]t/", "11th")); // false (0)
var_dump(preg_match("/[a-z]t/", "cat")); // true (1)
var_dump(preg_match("/[a-z]t/", "PIT")); // false (0)
var_dump(preg_match("/[a-zA-Z]!/", "11!")); // false (0)
var_dump(preg_match("/[a-zA-Z]!/", "stop!")); // true (1)
