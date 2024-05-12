<?php

header('Content-Type: text/plain');

// PHP also provides a mechanism for declaring that certain methods on the class
// must be implemented by subclasses--the implementation of those methods is NOT
// defined in the parent class, In these cases, you provide an abstract method;
// In addition, If a class contains `any methods` defined as abstract, you must
// also declare the class as an abstract class. 📝

// Abstract class CANNOT be instantiated. Also note that, unlike some language,
// PHP does NOT allow you to provide a default implementation for abstract
// method. 📝

// When you implement an abstract method in a child class, the method signatures
// must match--that is, they must take in the same number of required parameters
// , and if any of the parameters have type hints, those type hints must match.
// In addition, the method must have the same or less restricted visibility. 📝

abstract class Component
{
    abstract public function printOutput();
}

class ImageComponent extends Component
{
    public function printOutput()
    {
        echo "Pretty picture\n";
    }
}

// Traits can also declare abstract methods. Classes that include a trait that
// defines an abstract method must implement that method. 📝

trait Sortable
{
    abstract public function uniqueId();

    public function compareById($object)
    {
        return ($object->uniqueId() < $this->uniqueId()) ? -1 : 1;
    }
}

class Bird
{
    use Sortable;

    private string $id;

    public function __construct()
    {
        $this->id = bin2hex(random_bytes(64));
    }

    public function uniqueId()
    {
        return __CLASS__ . ":{$this->id}";
    }
}

class Car
{
    use Sortable;

    private string $id;

    public function __construct()
    {
        $this->id = bin2hex(random_bytes(64));
    }

    public function uniqueId()
    {
        return __CLASS__ . ":{$this->id}";
    }
}

$b = new Bird;
$c = new Car;
var_dump($c->compareById($b)); // -1
