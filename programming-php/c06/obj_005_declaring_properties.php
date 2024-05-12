<?php

header('Content-Type: text/plain');

// Property declarations are optional.
// It's good PHP style to declare your properties, but you can add new
// properties at any time.

// Here's a version of the Person class that has an undeclared `$name` property.

class Person
{
    function getName()
    {
        return $this->name;
    }

    function setName($newName)
    {
        $this->name = $newName;
    }
}

// You can assign default values to properties, but those default values MUST BE
// simple constants
// public $name = "J Doe"; ✅
// public $age = 0; ✅
// public $day = 60 * 60 * hoursInDay(); ❌

// Using access modifiers, you can change the visibility of properties
// Properties that are accessible outside the object's scope should be declared
// `public`
// Properties on an instance that can be accessed only by methods within the
// same class should be declared `private`
// Properties declared as `protected` can be accessed only by the object's class
// methods and the class methods of classes inheriting from the class.

class Person2
{
    protected $rowId = 0;
    public $username = 'Anyone can see me';
    private $hidden = true;
}

// PHP allows you to define `static` properties, which are variables on an
// object class, and can be accessed by referencing the property with the class
// name

// Inside an instance of the object class, you can also refer to the static
// property using the `self` keyword, like
// echo self::$global; 📝

class Person3
{
    static $global = 23;

    public function testStatic()
    {
        echo self::$global . "\n";
    }
}

$localCopy = Person3::$global;
var_dump($localCopy); // 23
Person3::$global = 25;
var_dump(Person3::$global); // 25
var_dump($localCopy); // 23
$p3 = new Person3();
$p3->testStatic(); // 25

// If a property is accessed on an object that does NOT exist, and if the
// `__get()` or `__set()` method is defined for the object's class, that method
// is given an opportunity to either retrieve a value or set the value of that
// property 📝

// For example, you might declare a class that represents data pulled from a
// database, but you might NOT want to pull in large data values--such as Binary
// Large Object (BLOBs), One way to implement that, of course, would be to
// create access methods for the property that read and write the data
// **whenever requested**. 📝

// เท่าที่เข้าใจคือ แทนที่เราจะประกาศ property ที่มี expensive operation อย่างตัวอย่างที่กล่าวข้างบน
// ว่าต้องอ่านและเขียนข้อมูลขนาดใหญ่ เราคงไม่ประกาศ public $biography; property คาไว้ แต่สร้าง
// __get, __set method มาไว้ใช้สำหรับ ตอนที่เราจะเรียกเมื่อต้องใช้งานจริงๆเท่านั้น

class Person4
{
    public function __get($property)
    {
        if ($property === 'biography') {
            $biography = "long text here..."; // would retrieve from database
            return $biography;
        }
    }

    public function __set($property, $value)
    {
        if ($property === 'biography') {
            // set the value in the database.
            echo "set biography with value: {$value}";
        }
    }
}

$p4 = new Person4;
echo $p4->biography; // call biography property, print -> long text here...
echo "\n";
$p4->biography = "John King"; //print -> set biography with value: John King
