<?php

header('Content-Type: text/plain');

// As with global constants, assigned through the `define()` function,
// PHP provides a way to assign constants within a class. Like static
// properties, constants can be accessed directly through the class or within
// object methods using the `self` notation. 📝

// Class constants that are accessible outside methods on the object should be
// declared `public`

// Class constants on an instance that can be accessed only by methods within
// the same class should be declared `private`

// Class constants declared as `protected` can be accessed only from within the
// object's class methods and the class methods of classes inheriting from the
// class

class PaymentMethod
{
    // It is common practice to define class constants with uppercase identifiers.
    public const TYPE_CREDITCARD = 0;
    public const TYPE_CASH = 1;

    public function printTypeCreditCard()
    {
        return match (self::TYPE_CREDITCARD) {
            0 => "Credit Card Type: Zero",
            1 => "Credit Card Type: One",
            default => "Unknown credit card type"
        };
    }
}

$pm = new PaymentMethod;
echo PaymentMethod::TYPE_CASH . "\n"; // 1
echo $pm->printTypeCreditCard() . "\n"; // Credit Card Type: Zero
