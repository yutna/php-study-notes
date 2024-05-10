<?php

declare(strict_types=1);

header('Content-Type: text/plain');

// Once you have an object, you can use the `->` notation to access methods and
// properties of the object.
// $object->propertyName, $object->methodName([arg, ...])

// For example
// $moana->age // property access
// $moana->birthday(); // method call
// $moana->setAge(21); // method call with arguments

// Within a class's definition, you can specify which methods and properties are
// publicly accessible and which are accessible only from within the class
// itself using the `public` and `private` access modifiers. You can use these
// to provide encapsulation.

// You can use variable variable with property names
// $prop = 'age';
// $moana->$prop; 😈

// A static method is one that is called on a class, NOT on an object. Such
// methods CANNOT access properties. The name of a static method is the class
// name followed by two colons and the function name.
// e.g. HTML::p("Hello, world");
// When declaring a class, you define which `properties` and `methods` are
// `static` using the `static` access property.

class Person
{
    private string $name;
    private int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

// Once created, objects are passed by reference.
$f = new Person("Pua", 75);
$b = $f; // $b and $f point at same object
$b->setName("Hei Hei");
printf("%s and %s are best friends.\n", $b->getName(), $f->getName());
// Hei Hei and Hei Hei are best friends.

// If you want to create a true `copy` of an object, you use the clone operator
$f = new Person("Pau", 35);
$b = clone $f; // make a copy
$b->setName("Hei Hei"); // change the copy
printf("%s and %s are best friends.\n", $b->getName(), $f->getName());
// Hei Hei and Pua are best friends

// When you use the `clone` operator to create a copy of an object and that
// class declares the `__clone()` method, that method is called on the new
// object immediately after it's cloned. You might use this in cases where an
// object holds external resources (such as file handles) to create new
// resources, rather than copying the existing ones.

class TestClone
{
    // จากที่ทดลอง เหมือนจะต้องประกาศเป็น public ได้อย่างเดียว private กับ protected ไม่ได้
    public function __clone()
    {
        print("Cloned!!!");
    }
}

$tc = new TestClone;
$copy = clone $tc;
// Cloned!! call immediately
