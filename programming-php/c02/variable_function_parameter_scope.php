<?php

function greet($name)
{
    echo "Hello, {$name} <br />";
}

greet("Janet");
var_dump($name); // NULL

// NOTE: The function parameters have local scope, which means that
// the parameter variables are only accessible inside the function.
