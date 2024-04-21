<?php

header("Content-Type: text/plain");

// echo is a language construct, it is NOT a true function,
// you can call this function without parentheses

echo "Printy";
echo "\n";
echo ("Printy"); // also valid
echo "\n";

// echo with multiple items
echo "First", "Second", "Third";
echo "\n";

// Don't use parentheses with multiple values
// echo("Hello", "world"); // FATAL error
