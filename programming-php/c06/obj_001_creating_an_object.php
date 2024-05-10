<?php

header('Content-Type: text/plain');

// To create an object of a given class, use the `new` keyword.
// $object = new Class; or
// $object = new Class(args); - if its accepts arguments.

// The class name does NOT have to be hardcoded into your program. You can apply
// the class name through a variable
// $class = "Person";
// $object = new $class;
// is equivalent to
// $object = new Person;

// Variable variable work with objects as shown here
// $account = new Account;
// $object = "account";
// ${$object}->init(50_000, 1.10); 😈 // same as $account->init(50_000, 1.10);
