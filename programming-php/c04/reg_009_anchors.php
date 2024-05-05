<?php

header("Content-Type: text/plain");

// An anchor limits a match to particular location in the string
// An anchor do NOT match actual characters in the target string

// ^        -> Start of string
// $        -> End of string
// [[:<:]]  -> Start of word
// [[:>:]]  -> End of word
// \b       -> Word boundary (between \w and \W or start or end of string)
// \B       -> Nonword boundary (between \w and \w or \W and |W)
// \A       -> Beginning of string
// \Z       -> End of string or before \n at end
// \z       -> End of string
// ^        -> Start of line (or after \n if /m flag is enabled)
// $        -> End of line (or before \n if \m flag is enabled)

// NOTE:
// A word boundary is defined as the point between a whitespace character and
// identifier (alphanumberic and underscore) character:

// The beginning and end of string also qualify as word boundaries.

var_dump(preg_match("/[[:<:]]gun[[:>:]]/", "the Burgundy exploded", $captured)); // false (0)
var_dump($captured);

echo "\n------------------------------------------------------------------\n\n";

var_dump(preg_match("/gun/", "the Burgundy exploded", $captured)); // true (1)
var_dump($captured);
