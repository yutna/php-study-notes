<?php

header('Content-Type: text/plain');

// To get the class to which an object belongs, first make sure it is an object
// using the `is_object()` function, and then get the class with the
// `get_class()` function.
// $is_object = is_object(var);
// $classname = get_class(object);

// Before calling a method on an object, you can ensure that it exists using
// the `method_exists()` function.
// $method_exists = method_exists(object, method);

// `get_object_vars()` returns an array of properties set in an object:
// $properties = get_object_vars(object);
class Person
{
    public $name;
    public $age;
}

$fred = new Person;
$fred->name = "Fred";
$props = get_object_vars($fred);
print_r($props); // array('name' => 'Fred', 'age' => NULL);

// The `get_parent_class()` also accepts an object too.

class A
{
}

class B extends A
{
}

$obj = new B;
echo get_parent_class($obj); // A
echo get_parent_class('B'); // A
