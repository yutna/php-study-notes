<?php

function updateCounter()
{
    static $counter = 0;
    $counter++;

    echo "Static counter is now {$counter}<br />";
}

$counter = 10;
updateCounter();
updateCounter();

echo "Global counter is {$counter}";
