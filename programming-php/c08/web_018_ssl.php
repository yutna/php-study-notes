<?php

// The HTTPS entry in the `$_SERVER` array is set to `on` if the PHP page was
// generated in response to a request over an SSL connection.

// To prevent a page from being generated over a nonencrypted connection,
// simply use:
// if ($_SERVER['HTTPS'] !== 'on') {
//     die("Must be a secure connection");
// }

if (array_key_exists('HTTPS', $_SERVER)) {
    echo "You are in a secure connection.";
} else {
    die('Must be a secure connection');
}
