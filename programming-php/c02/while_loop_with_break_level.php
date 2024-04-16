<?php

$i = 0;
$j = 0;

while ($i < 10) {
    while ($j < 10) {
        if ($j === 5) {
            break 2; // breaks out of two while loops
        }

        $j++;
    }

    $i++;
}

echo "{$i}, {$j}" . "<br />";
echo "----------------------";
echo "<br />";

$i = 0;
$j = 0;
$z = 0;

while ($i < 10) {
    while ($j < 10) {
        while ($z < 10) {
            if ($z === 6) {
                break 2;
            }

            $z++;
        }

        $j++;
    }

    $i++;
}

echo "{$i}, {$j}, {$z}" . "<br />";
