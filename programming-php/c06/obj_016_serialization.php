<?php

declare(strict_types=1);

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

// RECHECK: 🤔 หัวข้อนี้อีกทีเพราะตัวอย่างในหนังสือมันใช้ไม่ได้ มัน error นี่ไปหาวิธีใน net มาทำให้มัน
// run ได้ และถ้าจะรันตัวอย่างนี้ให้ปิด auto-refresh ด้วย

require_once 'Log.php';
session_start();

function serialization_example()
{
    $now = date('r');

    if (!isset($_SESSION['logger'])) {
        $logger = new Log();
        $_SESSION['logger'] = $logger;
        $logger->write("Created {$now}");

        echo "<p>Created session and persistent log object.</p>";
    } else {
        $logger = $_SESSION['logger'];
    }

    $logger->write("Viewed first page {$now}");

    echo "<p>The log contains:</p>";
    echo nl2br($logger->read());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialization Example</title>
</head>

<body>
    <?php serialization_example(); ?>
    <a href="next.php">Move to the next page</a>
</body>

</html>
