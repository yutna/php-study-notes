<?php

header("Content-Type: text/plain");

// The default is pad on the right with space
$string = str_pad("Fred Flintstone", 30);
echo "{$string}:35:wilma\n"; // Fred Flintstone               :35:wilma

// The optional third argument is the string to pad with:
$string = str_pad("Fred, Flintstone", 30, '. ');
echo "{$string}35\n"; // Fred, Flintstone. . . . . . . 35

// The optional fourth argument can BE STR_PAD_RIGHT (default), STR_PAD_LEFT or
// STR_PAD_BOTH
echo "[" . str_pad("Fred Flintstone", 30, ' ', STR_PAD_LEFT) . "]\n";
echo "[" . str_pad("Fred Flintstone", 30, ' ', STR_PAD_BOTH) . "]\n";
