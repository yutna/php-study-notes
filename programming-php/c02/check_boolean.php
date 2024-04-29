<?php

$x = false;

if (is_bool($x)) {
    echo "x is boolean"; // print this statement
}

$y = "0";

if (is_bool($y)) {
    echo "y is boolean"; // NOT print this statement
}
