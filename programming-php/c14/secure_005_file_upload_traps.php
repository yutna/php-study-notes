<?php

// Distrust browser-supplied filenames
// You can use the browser-supplied name for all user interaction, but generate
// a unique name yourself to actually call the file.

$counter = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $browser_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    echo "Thanks for sending me {$browser_name}";

    $counter++;
    $filename = "image_{$counter}";

    if (is_uploaded_file($temp_name)) {
        move_uploaded_file($temp_name, "/web/images/{$filename}");
    } else {
        die("There was a problem processing the file.");
    }
}

// -----------------------------------------------------------------------------

// Beware of filling your filesystem
// Another trap is the size of uploaded file.
// Set the `post_max_size` configuration option in `php.ini` to the maximum size
// that you want.
// PHP will ignore requests with data payloads larger than this size.

// -----------------------------------------------------------------------------

// Account for EGPCS settings
// The default variable order processes GET and POST parameters before cookies,
// This makes it possible for the user to send a cookie that overwrites the
// global variable you think contains information on your upload file. To avoid
// being tricked like this, check that the given file was actaully an uploaded
// file using the `is_uploaded_file()` function.
// PHP provides a `move_uploaded_file()` function that moves the file only if it
// was an uploaded file. This perferable to moving the file directly with a
// system-level function or PHP's copy() function.

// สรุปง่ายๆ ให้ใช้ is_uploaded_file() กับ move_uploaded_file() ในการจัดการไฟล์อัพโหลด จบ

// -----------------------------------------------------------------------------
