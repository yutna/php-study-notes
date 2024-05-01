<?php

header("Content-Type: text/plain");

$pattern = "/cat|dog/";

var_dump(preg_match($pattern, "the cat rubbed my legs")); // true (1)
var_dump(preg_match($pattern, "the dog rubbed my legs")); // true (1)
var_dump(preg_match($pattern, "the rabbit rubbed my legs")); // false (0)

// "/^cat|dog$/ meaning that it matches a line that either starts with "cat" or
// ends with "dog"

// "/^(cat|dog)$/" meanings that it matches a line that contains just "cat" or
// "dog"

$pattern = "/^([a-z]|[0-9])/"; // ขึ้นต้นด้วย a-z หรือ 0-9
var_dump(preg_match($pattern, "The quick brown fox")); // false (0)
var_dump(preg_match($pattern, "jumped over")); // true (1)
var_dump(preg_match($pattern, "10 lazy dogs")); // true (1)
