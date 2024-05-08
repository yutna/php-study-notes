<?php

header('Content-Type: text/plain');

// The in_array() function returns true or false, depending on whether the first
// argument is an element in the array given as the second argument
// $result = in_array(to_find, array [, strict]);
// If the optional third argument is true, the types of `to_find` and the value
// in the array must match. The default is to not check the data types

$addresses = array(
    'spam@cyberpromo.net',
    'abuse@example.com',
    'root@example.com'
);

$got_spam = in_array('spam@cyberpromo.net', $addresses);
var_dump($got_spam);

echo "\n";

$got_milk = in_array('milk@tucows.com', $addresses);
var_dump($got_milk);

echo "\n\n----------------------------------------------------------------\n\n";

// array_search() returns the key of the element if found
// $key = array_search(search, array [, strict]);
$person = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');
$key = array_search('Wilma', $person);
echo "Fred's {$key} is Wilma\n";

$numbers = array(1, 2, 3, 4, 5);
$key = array_search(4, $numbers);
echo $key; // 3
