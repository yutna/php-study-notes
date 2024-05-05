<?php

header('Content-Type: text/plain');

// เราสามารถ Inline trailing options ได้โดยใช้ syntax
// (?flag:subpattern)
// ซึ่งจะมีผลเฉพาะตรง part นั้นๆ

var_dump(preg_match('/I like (?i:PHP)/', 'I like pHp', $captured)); // true (1)
var_dump($captured);

echo "\n------------------------------------------------------------------\n\n";

// Inline multiple trailing options
var_dump(preg_match('/eat (?ix:foo d)/', 'eat FoOD', $captured)); // true (1)
var_dump($captured); // ix case-insensitive, remove white-space and comment

echo "\n------------------------------------------------------------------\n\n";

// Prefix an option with a hyphen (-) to turn it off
var_dump(preg_match('/I like (?-i:PHP)/', 'I like pHp', $captured)); // false (0)
var_dump($captured);

echo "\n------------------------------------------------------------------\n\n";

// An alternative form enables or disables the flags until the end of the
// enclosing subpattern or pattern
var_dump(preg_match('/I like (?i)PHP/', 'I like pHp', $captured)); // true (1)
var_dump($captured);

var_dump(preg_match('/I like (?-i)PHP/', 'I like pHp', $captured)); // false (1)
var_dump($captured);

echo "\n------------------------------------------------------------------\n\n";

// NOTE: inline flags do NOT enable capturing. You need an additional set of
// capturing parentheses to do that.

var_dump(preg_match('/I (like (?i)PHP) a lot/', 'I like pHp a lot', $captured));
var_dump($captured);
