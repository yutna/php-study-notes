<?php

header('Content-Type: text/plain');

$addresses = array('spam@cyberpromo.net', 'abuse@example.com');
$address_count = count($addresses);

for ($i = 0; $i < $address_count; $i++) {
    $value = $addresses[$i];
    echo "{$value}\n";
}
