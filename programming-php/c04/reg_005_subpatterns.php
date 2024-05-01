<?php

header("Content-Type: text/plain");

// You can use parentheses group bits of a regular expression together to be
// treated as a `single unit` called a subpattern.
var_dump(preg_match("/a (very )+big dog/", "it was a very very big dog")); // true (1)
var_dump(preg_match("/^(cat|dog)$/", "cat")); // true (1)
var_dump(preg_match("/^(cat|dog)$/", "dog")); // true (1)

// If you pass an array as the third argument to a match function, the array is
// populated with any captured substrings:
var_dump(preg_match("/([0-9]+)/", "You have 42 magic beans", $captured)); // true (1)
var_dump($captured);
