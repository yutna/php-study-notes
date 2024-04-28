<?php

header("Content-Type: text/plain");

$string = "Fred,Flintstone,35,Wilma";
$token = strtok($string, ",");

while ($token !== false) {
    echo "{$token}\n";
    // To retrieve the rest of the tokens, repeatedly call strtok() with only
    // the separator:
    $token = strtok(",");
}

// NOTE:
// The strtok() function lets you iterate through a string, getting a new chunk
// (token) each time.

// The strtok() function returns false when there are no more tokens to be returned.

// Call strtok() with two arguments to reinitialize the iterator. This reset the
// tokenizer from the start of the string.
