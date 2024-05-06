<?php

header('Content-Type: text/plain');

// Using simple assignment to initialize an array
$addresses[0] = 'spam@cyberpromo.net';
$addresses[1] = 'abuse@example.com';
$addresses[2] = 'root@example.com';

// Here's an associative array
$price['gasket'] = 15.29;
$price['wheel'] = 75.25;
$price['tire'] = 50.00;

// Using array() construct
$addresses = array('spam@cyberpromo.net', 'abuse@example.com', 'root@example.com');

// An array() construct with associative array
$price = array(
    'gasket' => 15.29,
    'wheel' => 72.25,
    'tire' => 50.00
);

// An array using a shorter, alternative syntax
$price = ['gasket' => 15.29, 'wheel' => 75.25, 'tire' => 50.0];

// To construct an empty array
$addresses = array();

// You can specify an initial key with => and then a list values, The values
// are inserted into the array starting with that key, with subsequent values
// having sequentials keys
$days = array(1 => 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
print_r($days);
// Array
// (
//     [1] => Mon
//     [2] => Tue
//     [3] => Wed
//     [4] => Thu
//     [5] => Fri
//     [6] => Sat
//     [7] => Sun
// )

// If the initial index is a NON-NUMBERIC string, subsequent indices are
// integers beginning at 0
$whoops = array('Fri' => 'Black', 'Brown', 'Green');
print_r($whoops);
// Array
// (
//     [Fri] => Black
//     [0] => Brown
//     [1] => Green
// )
