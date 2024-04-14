<?php

// Create an array with array constructor.
$persons = array('Edition', 'Wankel', 'Crapper');
$creators = array(
    'Light bulb' => 'Edition',
    'Rotary Engine' => 'Wankel',
    'Toilet' => 'Crapper'
);

sort($persons);
foreach ($persons as $name) {
    echo "Hello, {$name}<br />";
}

asort($creators); // sort associative by value
foreach ($creators as $invention => $inventor) {
    echo "{$inventor} invented the {$invention}<br />";
}
