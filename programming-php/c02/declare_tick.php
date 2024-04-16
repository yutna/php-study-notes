<?php

register_tick_function("someFunction");

declare(ticks=3) {
    for ($i = 0; $i < 10; $i++) {
        echo "i: {$i} <br />";
    }
}

function someFunction()
{
    echo "some function <br />";
}
