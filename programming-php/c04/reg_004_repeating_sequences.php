<?php

header("Content-Type: text/plain");

// Supported `quantifiers`
// ?        -> 0 or 1
// *        -> 0 or more
// +        -> 1 or more
// {n}      -> Exactly n times
// {n, m}   -> At least n, no more than m times
// {n,}     -> At least n times

var_dump(preg_match("/ca+t/", "caaaaaaat")); // true (1)
var_dump(preg_match("/ca+t/", "ct")); // false (0)
var_dump(preg_match("/ca?t/", "caaaaaaat")); // false (0)
var_dump(preg_match("/ca*t/", "ct")); // true (1)

var_dump(preg_match("/[0-9]{3}-[0-9]{3}-[0-9]{4}/", "303-555-1212")); // true (1)
var_dump(preg_match("/[0-9]{3}-[0-9]{3}-[0-9]{4}/", "64-9-555-1234")); // false (0)
