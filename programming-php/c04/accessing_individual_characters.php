<?php

header('Content-Type: text/plain');

$string = 'Hello';

// NOTE:
// The curly brace ({}) syntax for accessing array and string offsets has been
// deprecated in PHP 7.4 and removed entirely in PHP 8.1.17

for ($i = 0; $i < strlen($string); $i++) {
    printf("The %dth character is %s\n", $i, $string[$i]);
}
