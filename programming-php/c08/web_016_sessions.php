<?php

// PHP has built-in support for sessions, handling all the cookie manipulation
// for you to provide persistent variables that are accessible from different
// page and across multiple visits to the site.

// Sessions allow you to easily create multipage forms (such as shopping cart),
// save user authentication information from page to page, and store persistent
// user preferences on a site.

// Each first-time visitor is issued a unique session ID. By default, the
// session ID is stored in a cookie called `PHPSESID`. If the user's browser
// does NOT support cookies or has cookies turn off, the session ID is
// propagated in URLs within the website.

// Every session has a data store associated with it. You can `register`
// variables to be loaded from the data store when each page starts and saved
// back to the data store when the page ends.

// Registered variables persist between pages, and changes to variables made on
// one page are visible from others. For example, an "add this to your shopping
// cart" link can take the user to a page that adds an item to a registered
// array of items in the cart. This registered array can then be used on another
// page to display the contents of the cart.

// Sessions start automatically when a script begins running. A new session ID
// is generated if necessary, possibly creating a cookie to be sent to the
// browser, and loads any persistent variables from the store.

// You can register a variable with the session by passing the name of the
// variable to the `$_SESSION[]` array.

// The `session_start()` function loads registered variables into the
// associative array `$_SESSION`. The `session_id()` function returns the
// current session ID.

// To end a session, call `session_destroy()`. This removes the data store for
// the current session, but it does NOT remove cookie from the browser cache.
// This means that, on subsequent visits to session-enabled pages, the user will
// have the same session ID as before the call to `session_destroy()`, but none
// of the data.

// By default, PHP session ID cookies expire when the browser closes. That is,
// sessions do NOT persist after the browser ceases to exist. To change this,
// you'll need to set the `session.cookie_lifetime` option in `php.ini` to the
// lifetime of the cookie in seconds.

// You can change the location of the session files by setting the
// `session.save_path` value in `php.ini`. If you are on a shared server with
// your own installation of PHP, set the directory to somewhere in your own
// directory tree, so other users on the same machine cannot access your
// session file.

// PHP can store session information in one of two formats in the current
// session store--either PHP's built-in format or Web Distributed Data eXchange
// (WDDX). You can change the format by setting the `session.serialize_handler`
// value in your `php.ini` file to either `php` for the default behavior, or
// `wddx` for WDDX format. ถ้าจะใช้ wddx เหมือนต้อง PHP ที่ใช้ต้อง compile ให้ support
// function นี้ด้วย จากที่ลองกับ Herd เหมือนจะไม่ได้

session_start();

$colors = array('black', 'white', 'red', 'blue');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions - Preferences Set</title>
</head>

<body>
    <form action="prefs_session.php" method="POST">
        <div>
            <label for="background">Background:</label>
            <select name="background" id="background">
                <?php foreach ($colors as $color) : ?>
                    <option value="<?= $color ?>">
                        <?= ucfirst($color) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br />
        <div>
            <label for="foreground">Foreground:</label>
            <select name="foreground" id="foreground">
                <?php foreach ($colors as $color) : ?>
                    <option value="<?= $color ?>">
                        <?= ucfirst($color) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br />
        <input type="submit" value="Change Preferences" />
    </form>
</body>

</html>
