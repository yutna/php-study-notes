<?php

header('Content-Type: text/plain');

// Traits provides a mechanism for reusing code outside of a class hierarchy.
// Traits allow you to share functionality across different classes that don't
// (and shouldn't) share a common ancestor in a class hierarchy.

// triat traitname [ extends baseclass ] {
//     [ use traitname, [ traitname, ... ];]
//     [ visibility $property [ = value ]; ...]
//     [ function functionName (arge) {
//       }
//     ]
// }

// To declare that a class should include a trait's methods, include the `use`
// keyword and any number of traits, separated by commas.

trait Logger
{
    public function log($log_string)
    {
        $class_name = __CLASS__;
        echo date('Y-m-d h:i:s', time()) . ": [{$class_name}] {$log_string}\n";
    }
}

class User
{
    use Logger;

    public $name;

    public function __construct($name = '')
    {
        $this->name = $name;
        $this->log("Created user '{$this->name}'");
    }

    public function __toString()
    {
        return $this->name;
    }
}

class UserGroup
{
    use Logger;

    private array $users = [];

    public function addUser(User $user)
    {
        if (!in_array($user, $this->users)) {
            $this->users[] = $user;
            $this->log("Added user '{$user}' to group");
        }
    }
}

$group = new UserGroup;
$group->addUser(new User("Franklin"));
// 2024-05-12 05:19:43: [User] Created user 'Franklin'
// 2024-05-12 05:19:43: [UserGroup] Added user 'Franklin' to group

// To declare that a trait should be composed of other traits, include the `use`
// statement in the trait's declaration, followed by one or more trait names
// separated by commas.

trait First
{
    public function doFirst()
    {
        echo "First\n";
    }
}

trait Second
{
    public function doSecond()
    {
        echo "Second\n";
    }
}

trait Third
{
    use First, Second;

    public function doAll()
    {
        $this->doFirst();
        $this->doSecond();
    }
}

class Combined
{
    use Third;
}


$combined = new Combined;
$combined->doAll();

// Traits can declare abstract methods. 📝

// If a class uses multiple traits defining the same method, PHP gives a fatal
// error. However, you can override this behavior by telling the compiler
// specifically which implementation of a given method you want to use. When
// defining which traits a class includes, use the `insteadof` keyword for each
// conflict. 📝

trait Command
{
    function run()
    {
        echo "Executing a command\n";
    }
}

trait Marathon
{
    function run()
    {
        echo "Running a marathon\n";
    }
}

class Person
{
    use Command, Marathon {
        Marathon::run insteadof Command;
    }
}

// Instead of picking just one method to include, you can use the `as` keyword
// to alias a trait's method within the class including it to a different name.
// You must still explicitly resolve any conflicts in the included traits. 📝

class Person2
{
    use Command, Marathon {
        Command::run as runCommand;
        Marathon::run insteadof Command;
    }
}

$p2 = new Person2;
$p2->run(); // Running a marathon
$p2->runCommand(); // Executing a command
