<?php

class Entertainment
{
}

class Clown extends Entertainment
{
}

class Job
{
}

function handle_entertainment(Entertainment $a, callable $callback = null)
{
    echo "Handling " . get_class($a) . " fun<br />";

    if (!is_null($callback)) {
        $callback();
    }
}

$callback = function () {
    echo "This is callback";
};

handle_entertainment(new Clown);
// handle_entertainment(new Job, $callback);

// NOTE:
// A type-hinted parameter must be NULL, an instance of the given class or a
// subclass of the class, an array, or callable as a specified parameter.
// Otherwise, a runtime error occurs.
