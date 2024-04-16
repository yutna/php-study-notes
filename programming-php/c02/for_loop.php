<?php

for ($counter = 0; $counter < 10; $counter++) {
    echo "Counter is $counter <br />";
}

echo "--------------------------------------------<br />";

// For with colon syntax

for ($counter = 0; $counter < 10; $counter++) :
    echo "Counter is $counter <br />";
endfor;

echo "--------------------------------------------<br />";

// For loop with multiple expressions, each expression separate by comma (,)

$total = 0;

for ($i = 0, $j = 1; $i <= 10; $i++, $j *= 2) {
    echo "j = $j <br />";
    $total += $j;
}

echo "Total: {$total} <br />";

// Don't run this
// This is an infinite loop syntax when using for-loop

// for (;;) {
//     echo "Can't stop me! <br />";
// }
