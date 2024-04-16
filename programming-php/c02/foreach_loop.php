<?php

$numbers = [1, 2, 3, 4, 5];

foreach ($numbers as $number) {
    echo "Number: {$number} <br />";
}

echo "--------------------------------------------<br />";

// Foreach alternative syntax with colon (:)

foreach ($numbers as $number) :
    echo "Number: {$number} <br />";
endforeach;

echo "--------------------------------------------<br />";

// Foreach with associative array

$users = [
    'first_name' => 'Yutthana',
    'last_name' => 'Siphuengchai',
    'age' => 34
];

foreach ($users as $key => $value) :
    echo "{$key}: {$value} <br />";
endforeach;
