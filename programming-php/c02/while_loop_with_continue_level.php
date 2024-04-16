<?php

$i = 0;
$j = 0;

while ($i < 10) {
    $i++;

    while ($j < 10) {
        if ($j === 5) {
            continue 2;
        }

        $j++;
    }
}

echo "{$i}, {$j}" . "<br />";
