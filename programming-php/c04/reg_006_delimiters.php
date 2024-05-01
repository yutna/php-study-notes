<?php

header("Content-Type: text/plain");

// Any nonalphanumeric character other than the backslash character (\) can be
// used to delimit a Perl-style pattern.
// This is useful for matching string containing slashes
var_dump(preg_match("/\/usr\/local\//", "/usr/local/bin/perl")); // true (1)
var_dump(preg_match("#/usr/local/#", "/usr/local/bin/perl")); // true (1)

// Parentheses (), curly braces {}, square brackets [], and angle brackets <>
// can be used as pattern delimiters:
var_dump(preg_match("{/usr/local/}", "/usr/local/bin/perl")); // true (1)
