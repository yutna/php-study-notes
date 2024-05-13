<?php

header('Content-Type: text/plain');

// To determine whether a class exists, use the `class_exists()` function.
// Alternatively, you can use the `get_declared_classes()` function.
// $does_class_exist = class_exists(className);
// $classes = get_declared_classes();
// $does_class_exist = in_array(className, $classes);

// You can get methods and properties that exist in a class (including those
// that are inherited from superclass) using `get_class_methods()` and
// `get_class_vars()` functions. One quirk of `get_class_vars()` is that it
// returns only properties that have default values and visible in the current
// scope; there's no way to discover uninitialized properties.
// $methods = get_class_methods(className);
// $properties = get_class_vars(className);

// Use `get_parent_class()` to find a class's parent class.
// $superclass = get_parent_class(className);

function displayClasses()
{
    $classes = get_declared_classes();

    foreach ($classes as $class) {
        echo "Showing information about {$class}\n";
        $reflection = new ReflectionClass($class);

        $isAnonymous = $reflection->isAnonymous() ? "yes" : "no";
        echo "Is Anonymous: {$isAnonymous}\n";

        echo "Class methods:\n";
        $methods = $reflection->getMethods(ReflectionMethod::IS_STATIC);

        if (!count($methods)) {
            echo "None\n";
        } else {
            foreach ($methods as $method) {
                echo "{$method}\n";
            }
        }

        echo "Class properties:\n";
        $properties = $reflection->getProperties();

        if (!count($properties)) {
            echo "None\n";
        } else {
            foreach ($properties as $property) {
                echo "{$property}\n";
            }
        }

        echo "\n\n--------------------------------------------------------\n\n";
    }
}

displayClasses();
