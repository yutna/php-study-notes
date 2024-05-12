<?php

header('Content-Type: text/plain');

// To inherit the properties and methods from another class, use the `extends`
// keyword in the class definition, followed by the name of the base class.

// If a derived class has a property or method with the same name as one in its
// parent class, the property or method in the derived class takes precedence
// over the property or method in the parent class. Referencing the property
// returns the value of the property on the child, while referencing the method
// calls the method on the child.

// Use the `parent::method()` notation to access overriden method on an object's
// parent class

// If a method might be subclassed and you want to ensure that you're calling it
// on the current class, use the `self::method()` notation

// To check if an object is an instance of a particular class or if it
// implements a particular interface, you can use the `instanceof` operator

class Person
{
    public string $name;
    public string $address;
    public int $age;

    public function __construct(string $name, string $address, int $age)
    {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
    }

    public function getInfo()
    {
        echo "My name is {$this->name}, I am {$this->age} years old.\n";
    }
}

class Employee extends Person
{
    public string $position;
    public float $salary;

    public function __construct(string $name, string $address, int $age, string $position, float $salary)
    {
        // จากที่ search ใน net เหมือนว่าการเขียน super ใน PHP จะใช้ท่านี้ตรงๆไปเลย parent::__construct() 😁
        parent::__construct($name, $address, $age);
        // $this->name = $name;
        // $this->address = $address;
        // $this->age = $age;
        $this->position = $position;
        $this->salary = $salary;
    }

    public function getInfo()
    {
        parent::getInfo();
        echo "My position is {$this->position}.\n";
        // $this->getSalary();
        // self::getSalary(); 🤔
    }

    public function getSalary()
    {
        echo "My salary is {$this->salary}.\n";
    }
}

$p = new Person("Na", "", 34);
$p->getInfo();

$emp = new Employee("Yut", "", 34, "Software Engineer", 80_000.0);
$emp->getInfo();

if ($p instanceof Person) {
    echo "\$p is an instance of Person class\n"; // Yes
}

if ($p instanceof Employee) {
    echo "\$p is an instance of Employee class\n"; // NO
}

if ($emp instanceof Person) {
    echo "\$emp is an instance of Person class\n"; // Yes
}

if ($emp instanceof Employee) {
    echo "\$emp is an instance of Employee class\n"; // Yes
}
