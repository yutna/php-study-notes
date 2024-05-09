<?php

header('Content-Type: text/plain');

// The `array_reverse()` function reverses the internal order of elements in an
// array.
// $reversed = array_reverse(array);

// Numeric keys are renumbered starting at 0, while string indices are
// unaffected. In general, it's better to use the reverse-order sorting
// functions instead of sorting and then reversing the order of an array.

$numbers = array(1, 2, 3, 4, 5);
$reversed_numbers = array_reverse($numbers);
print_r($numbers); // no change
print_r($reversed_numbers); // [5, 4, 3, 2, 1]

echo "\n\n----------------------------------------------------------------\n\n";

// The `array_flip()` function returns an array that reverses the order of each
// original element's key-value pair. (The element's value becomes its key and
// the element's key becomes its value).

// $flipped = array_flip(array);

$username_to_homedir = array(
    'gnat' => '/home/staff/nathan',
    'frank' => '/home/action/frank',
    'petermac' => '/home/staff/petermac',
    'ktatroe' => '/home/staff/kevin',
);

$homedir_to_username = array_flip($username_to_homedir);

print_r($username_to_homedir); // no change
print_r($homedir_to_username);
// Array
// (
//     [/home/staff/nathan] => gnat
//     [/home/action/frank] => frank
//     [/home/staff/petermac] => petermac
//     [/home/staff/kevin] => ktatroe
// )
