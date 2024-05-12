<?php

header('Content-Type: text/plain');

// When an object is destroyed, such as when the last reference to an object is
// removed or the end of the script is reached, its `destructor` is called.
// Because PHP automatically cleans up all resources when they fall out of scope
// and at the end of a script's execution, their application is limited.
// The destructor is a method called `__destruct()` 📝

class Building
{
    function __destruct()
    {
        echo "A Building is being destroyed!";
    }
}

$b = new Building;
// It print "A Building is being destroyed!" when the script end.
