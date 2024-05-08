<?php

header('Content-Type: text/plain');

$addresses = array('spam@cyberpromo.net', 'abus@example.com');

foreach ($addresses as $value) {
    echo "Processing {$value}\n";
}

echo "\n\n----------------------------------------------------------------\n\n";

$person = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma');

foreach ($person as $key => $value) {
    echo "Fred's {$key} is {$value}\n";
}
