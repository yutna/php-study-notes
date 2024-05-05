<?php

header('Content-Type: text/plain');

var_dump(preg_match('/cat/i', 'Stop, Catherine!')); // true (1)

// Flag list
// i -> Match case-insensitively
// s -> Make period (.) match any character, including newline (\n)
// x -> Remove whitespace and comments from the pattern
// m -> Make caret (^) match after, and dollar sign ($) match before, internal newlines (\n)
// e -> If the replacement string is PHP code, eval() it to get the actual replacement string
// U -> Reverses the greedliness of the subpattern; * and + now match as little as possible
// u -> Causes pattern strings to be treated as UTF-8
// X -> Causes a backslash followed by a character with no special meaning to emit an error
// A -> Causes the beginning of the string to be anchored as if the first character of the pattern were ^
// D -> Causes the $ character to match only at the end of a line
// S -> Causes the expression parser to more carefully examine the structure of the pattern, so it may run
// slightly faster the next time (such as in a loop)

echo "\n------------------------------------------------------------------\n\n";

$message = <<<END
To: you@youcorp
From: me@mecorp
Subject: pay up

Pay me or else!
END;

preg_match('/^subject: (.*)/im', $message, $match);
var_dump($match);

// array(2) {
//     [0] => string(15) "Subject: pay up"
//     [1] => string(6) "pay up"
// }
