<?php

function takes_two($a, $b)
{
    if (isset($a)) {
        echo "a is set <br />";
    }

    if (isset($b)) {
        echo "b is set <br />";
    }
}

echo "With two arguments: <br />";
takes_two(1, 2);

echo "<br /><br />";

echo "With one argument: <br />";
// takes_two(1);
// ใน PHP 8.1 มัน FATAL error แต่ในหนังสือมันแค่ warning
