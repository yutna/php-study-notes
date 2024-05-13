<?php

// Serializing an object means converting it to a bytestream representation that
// can be stored in a file. This is useful for persistent data.
// $encoded = serialize(something);
// $something = unserialize(encoded);

// An object's class must be defined before unserialization can occur.
// Attempting to unserialize an object whose class is NOT yet defined puts the
// object into `stdClass`, which renders it almost useless.

// PHP has two hooks for objects during the serialization and unserialization
// processes:
// 1) __sleep();
// 2) __wakeup();
//
// These methods are used to notify objects that they're being serialized or
// unserialzied.
// Objects can be serialized if they do NOT have these methods; however, they
// won't be notified about the process.

// The `__sleep()` method is called on an object just before serialization; it
// can perform any cleanup necessary to perserve the object's state, such as
// closing database connections. It SHOULD return an array containing the names
// of the data members that need to be written into the bytestream. If you
// return an empty array, no data is written.

// The `__wakeup()` method is called on an object immediately after an object
// is created from a bytestream. The method can take any action it requires,
// such as reopening database connection and other initialization tasks.

include_once 'Log.php';
session_start();

$now = strftime("%c");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialization Example</title>
</head>

<body>

</body>

</html>
