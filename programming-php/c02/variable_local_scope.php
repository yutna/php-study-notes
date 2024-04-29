<?php

function updateCounter()
{
    $counter = 20;
    $counter++;
}

$counter = 10;
updateCounter();

echo $counter; // 10
