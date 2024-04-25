<?php

header('Content-Type: text/plain');

$string1 = "FRED flintstone";
$string2 = "barney rubble";

print(strtolower($string1)); // fred flintstone
echo "\n";

print(strtoupper($string1)); // FRED flintstone
echo "\n";

print(ucfirst($string2)); // Barney rubble
echo "\n";

print(ucwords($string2)); // Barney Rubble
echo "\n";

print(ucwords(strtolower($string1))); // Fred Flintstone
echo "\n";
