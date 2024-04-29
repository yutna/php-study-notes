<?php

function updateCounter()
{
    static $counter = 0;
    $counter++;

    echo "Static counter is now {$counter}<br />";
}

$counter = 10;
updateCounter(); // Static counter is now 1
updateCounter(); // Static counter is now 2

echo "Global counter is {$counter}"; // Global counter is 10
