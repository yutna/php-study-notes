<?php

header('Content-Type: text/plain');

var_dump(preg_match('/y.*e$/', 'Sylvie')); // true (1)
var_dump(preg_match('/y(.*)e$/', 'Sylvie', $captured)); // true (1)
var_dump($captured); // ['ylvie', 'lvi']

echo "\n------------------------------------------------------------------\n\n";

$string = <<<END
13 dogs
12 rabbits
8 cows
1 goat
END;

var_dump(preg_match_all('/(\d+) (\S+)/', $string, $m1, PREG_PATTERN_ORDER));
var_dump(preg_match_all('/(\d+) (\S+)/', $string, $m2, PREG_SET_ORDER));
var_dump($m1);
var_dump($m2);
