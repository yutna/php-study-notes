<?php

// header('Content-Type: text/plain');

// Every PHP array keeps track of the current element you're working with;
// the pointer to the current element is known as the `iterator`.
// PHP has functions to set, move, and reset this iterator.
// The iterator functions are:
// current() -> Returns the element currently pointed at by the iterator.
// reset() -> Moves the iterator to the first element in the array and return it.
// next() -> Moves the iterator to the next element in the array and return it.
// prev() -> Moves the iterator to the previous element in the array and return it.
// end() -> Moves the iterator to the last element in the array and return it.
// key() -> Returns the key of the current element.

// NOTE: each() function has been DEPRECATED as of PHP 7.2.0, and REMOVED as of PHP 8.0.0

$addresses = array('spam@cyberpromo.net', 'abuse@example.com');

reset($addresses);

while ($address = current($addresses)) {
    echo key($addresses) . " {$address}<br />";
    next($addresses);
}

reset($addresses);

echo "\n\n----------------------------------------------------------------\n\n";

$ages = array(
    'Person' => 'Age',
    'Fred' => 35,
    'Barney' => 30,
    'Tigger' => 8,
    'Pooh' => 40
);

// start table and print heading
reset($ages);

$c1 = key($ages);
$c2 = current($ages);

echo "<table border=\"1\"><tr><th>{$c1}</th><th>{$c2}</th></tr>";

// print the rest of the values
while ($age = current($ages)) {
    echo "<tr><td>" . key($ages) . "</td><td>{$age}</td></tr>";
    next($ages);
}

echo "</table>";
