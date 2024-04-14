<?php

// Solution 1: Use global keyboard to ref global variable
// function updateCounter()
// {
//     global $counter;
//     $counter++;
// }

// Solution 2: Use $GLOBALS array to ref global variable
function updateCounter()
{
    $GLOBALS['counter']++;
}

$counter = 10;
updateCounter();
echo $counter;
