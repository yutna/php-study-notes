<?php

header('Content-Type: text/plain');

// You can throw an error from within a script with the `assert()` function.
// assert(mixed $expression [, mixed $message]);
// The first parameter is the condition that must be `true` to NOT trigger the
// assertion; the second (optional) parameter is the message.
// Triggering errors is useful when you are writing your own functions for
// sanity checking the parameters.

function divider($a, $b)
{
    assert($b != 0, '$b cannot be 0');
    return ($a / $b);
}

echo divider(200, 3) . "\n";
echo divider(10, 0);
