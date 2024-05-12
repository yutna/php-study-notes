<?php

header('Content-Type: text/plain');

// An anonymous class behaves the same as any other class, except that you do
// NOT provide a name (which means it CANNOT be directly instantiated).

// Unlike instances of named classes, instances of anonymous classes CANNOT be
// serialized. Attempting to serialize an instance of an anonymous class results
// in an error. 📝

class Person
{
    public $name = '';

    function getName()
    {
        return $this->name;
    }
}

// สร้าง anonymous class ด้วยคำสั่ง new class() 📝

$anonymous = new class() extends Person
{
    public function getName()
    {
        return "Moana";
    }
};

echo $anonymous->getName(); // Moana
echo "\n";

$a = new class()
{
    public function printSomething()
    {
        echo "test!!!";
    }
};

$a->printSomething(); // test!!!
