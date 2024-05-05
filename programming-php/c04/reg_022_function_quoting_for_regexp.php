<?php

header('Content-Type: text/plain');

// Create a `Regular Expression` that matches only a given string
// เชรด เราสามารถสร้าง regexp จาก string ได้ด้วยว่ะ

$regexp = preg_quote('$5.00 (five bucks)');
print_r($regexp); // \$5\.00 \(five bucks\)

echo "\n\n----------------------------------------------------------------\n\n";

$to_find = '/usr/local/etc/rsync.conf';
$regexp = preg_quote($to_find, '/');
var_dump($regexp); // "\/usr\/local\/etc\/rsync\.conf"

if (preg_match("/{$regexp}/", $to_find)) {
    echo "Found it!";
}
