<?php

header('Content-Type: text/plain');

// Method names beginning with two underscores (__) may be used in the future by
// PHP, so it's recommended that you do NOT begin your method names with this
// sequence.

// Within a mehtod, the `$this` variable contains a reference to the object on
// which the method was called.
// Methods use the `$this` variable to access the properties of the current
// object and to call other methods on that object.

class Person
{
    public $name;

    function getName()
    {
        return $this->name;
    }

    function setName($newName)
    {
        $this->name = $newName;
    }
}

// To declare a method as a static method, use the `static` keyword. Inside of
// static methods the variable `$this` is NOT defined.

class HTMLStuff
{
    static function startTable()
    {
        echo "<table border=\"1\">\n";
    }

    static function endTable()
    {
        echo "</table>\n";
    }
}

HTMLStuff::startTable();
HTMLStuff::endTable();

// If you declare a method using the `final` keyword, subclasses CANNOT override
// that method

class Person2
{
    public $name;

    final function getName()
    {
        return $this->name;
    }
}

class Child extends Person2
{
    // Fetal error: Cannot override final method
    // function getName()
    // {
    // }
}

// Using access modifiers, you can change the visibility of methods. Defining
// the visibility of class methods is optional. if a visibility is NOT
// specified, a method is `public`.

// Methods that are accessible outside methods on the object should be declared
// `public`

// Methods on an instance can be called only by methods within the same class
// should be declared `private`

// Methods declared as `protected` can be called only from within the
// object's class method and the class methods of classes inheriting from the
// class.

// สรุปง่ายๆ
// private เรียกใช้ methods ได้เฉพาะภายใน class นั้นๆเท่านั้น class ที่ inherite ไปก็ไม่สามารถ
// เรียกใช้ได้
// protected เหมือน private แต่พิเศษตรงที่ class ที่ inherite ไปสามารถเรียกใช้ได้

class Person3
{
    public $age;

    public function __construct()
    {
        $this->age = 0;
    }

    public function incrementAge()
    {
        $this->age += 1;
        $this->ageChanged();
    }

    protected function decrementAge()
    {
        $this->age -= 1;
        $this->ageChanged();
    }

    private function ageChanged()
    {
        echo "Age changed to {$this->age}\n";
    }
}

class SupernaturalPerson extends Person3
{
    public function incrementAge()
    {
        $this->decrementAge();
        // $this->ageChanged(); // เรียก private ของ super class ไม่ได้
    }
}

$person = new Person3();
$person->incrementAge();
// $person->decrementAge(); (not allowed)
// $person->ageChanged(); (also not allowed)

$superhuman = new SupernaturalPerson();
$superhuman->incrementAge();

// You can use type hinting when declaring a method on an object
class Job
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }
}

class Person4
{
    function takeJob(Job $job)
    {
        echo "Now employed as a {$job->title}\n";
    }
}

$job = new Job("Software Engineer");
$p4 = new Person4();
$p4->takeJob($job); // Now employed as a Software Engineer

// When a method returns a value, you can use type hinting to declare the
// method's return value type

class Person5
{
    function bestJob(): Job
    {
        $job = new Job("PHP developer");
        return $job;
    }
}

$p5 = new Person5();
echo $p5->bestJob()->title;
