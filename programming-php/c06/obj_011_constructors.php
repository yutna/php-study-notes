<?php

header('Content-Type: text/plain');

// A constructor is a function in the class called `__construct()`.
// PHP does NOT provide for an automatic chain of constructors; that is, if you
// instantiate an object for a derived class, only the constructor in the
// derived class is automatically called. For the constructor of the parent
// class to be called, the constructor in the derived class must `explicitly`
// call the constructor.

class Person
{
    public $name, $address, $age;

    function __construct($name, $address, $age)
    {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
    }
}

class Employee extends Person
{
    function __construct($name, $address, $age, $position, $salary)
    {
        parent::__construct($name, $address, $age);

        $this->position = $position;
        $this->salary = $salary;
    }
}
