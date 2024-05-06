<?php

header('Content-Type: text/plain');

$person = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');

$keys = array_keys($person);
print_r($keys); // ['name', 'age', 'wife']

$values = array_values($person);
print_r($values); // ['Fred', 35, 'Wilma']
