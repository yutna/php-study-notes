<?php

header('Content-Type: text/plain');

// Interfaces provide a way for defining contracts to which a class adheres;
// The interface provides method prototypes and constants, and any class that
// implements the interface must provide implementations for all methods in the
// interface.

// interface interfaceName {
//    [ function functionName();
//      ...
//    ]
// }

// To declare that a class implements an interface, include the `implements`
// keyword and any number of interfaces, separated by commas

// An interface may inherit from other interfaces as long as none of the
// interfaces it inherits from declare methods with the same name as those
// declared in the child interface. 🤔🤯 ลองประกาศซ้ำแถมถาม chatGPT ให้ตัวอย่างก็ไม่มี
// error เด้งออกมาให้เห็นเลยแฮะ RECHECK: ด้วยในอนาคต

interface Printable
{
    public const DEFAULT_PAPER = 'A4';

    public function printOutput();
}

class ImageComponent implements Printable
{
    public function printOutput()
    {
        echo "Printing: " . self::DEFAULT_PAPER;
    }
}

$mc = new ImageComponent();
$mc->printOutput();
