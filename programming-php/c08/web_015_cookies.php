<?php

// A cookie is basically a string that contains several fields. A server can
// send one or more cookies to a browser in the headers of a response. Some of
// the cookie's fields indicate the pages for which the browser should send the
// cookie as part of the request. The value field of the cookie is the payload.
// Servers can store any data they like there (within limits), such as unique
// code identifying the user, preferences, and the like.

// Use the `setcookie()` function to send a cookie to the browser:
// setcookie(name [, value [, expires [, path [, domain [, secure , httponly ]]]]]);
// This function creates a cookie string from the given arguments and creates a
// Cookie header with that string as its value. Because cookies are sent as
// headers in the response. `setcookie()` must be called before any of the body
// of the document is sent.

// -----------------------------------------------------------------------------

// The parameters of `setcookie()` are:
// name -> A unique name of a particular cookie. The name must NOT contain
// whitespace or semicolons.

// value -> The arbitrary string value attached to this cookie.

// expires -> The expiration date for this cookie. If no expiration date is
// specified, the browser saves the cookie in memory and NOT on disk. When the
// browser exits, the cookie disappears. The expiration date is specified as the
// number of seconds since midnight, January 1, 1970 (GMT). For example, pass
// time() + (60 * 60 * 2) to expire the cookie in two hours time.

// path -> The browser will return the cookie only for URLs below this path.
// The default is the directory in which the current page resides. For example,
// If /store/front/cart.php sets a cookie and does NOT specify a path, the
// cookie will be sent back to the server for all pages whose URL path starts
// with /store/front/.

// domain -> The browser will return the cookie only for URLs within this domain
// The default is the server hostname.

// secure -> The browser will transmit the cookie only over `https` connections.
// The default is false.

// httponly -> If this parameter is set to true, the cookie will be available
// only via the HTTP protocol, and thus inaccessible via other means like
// JavaScript. Whether this allows for a more secure cookie is still up for
// debate, so use this parameter cautiously and test well.

// -----------------------------------------------------------------------------

// The `setcookie()` function also has an alternate syntax:
// setcookie($name, [, $value = "" [, $option = [] ]]);
// Where $options is an array that holds the orther parameters following the
// $value content. This saves a little on the code line length for the
// `setcookie()` funciton, but the $options array will have to be built prior
// to its use, so there is a trade-off of sorts in play.

// When a browser sends a cookie back to the server, you can access that cookie
// through the $_COOKIE array. e.g.
// $page_access_count = $_COOKIE['accesses'];
// setcookie('accesses', ++$page_access_count);

// When cookies are decoded, any periods (.) in a cookie's name are turned into
// underscores. e.g. a cookie named `top.top` is accessible as
// `$_COOKIE['tip_top']`;

// The cookie specification says that no cookie can exceed 4KB in size, only
// 20 cookies are allowed per domain and a total of 300 cookies can be stored
// on a client side. Some browsers may have higher limits, but you can NOT rely
// on that. Finally, you have no control over when browsers actually expire
// cookies--if a browser is at capacity and needs to add a new cookie, it may
// discard a cookie that has NOT yet expired. You should be careful of setting
// cookies to expire quickly. Expiration times rely on the client's clock being
// as accurate as yours. Many people do NOT have their system clocks set
// accurately, so you can NOT rely on rapid expiration.

// Despite these limitations, cookies are very useful for retaining information
// through repeated visits by a browser.

$colors = array('black', 'white', 'red', 'blue');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies - Set Your Preferences</title>
</head>

<body>
    <form action="prefs.php" method="POST">
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
