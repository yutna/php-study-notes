<?php

// HTTP authentication works through request headers and response statuses. A
// browser can send a username and password (the credential) in the request
// headers.

// If the credentials are NOT sent or are NOT satisfactory, the server
// sends a `401 Unauthorized` response and identifies the realm of
// authentication via the `WWW-Authenticate` header.

// This typically pops up an "Enter username and password for ..." dialog box
// on the browser, can the page is then re-requested with the updated
// credentials in the header.

// To handle authentication in PHP, check the username and password (the
// PHP_AUTH_USER and PHP_AUTH_PW items of $_SERVER) and call header() to set the
// realm and send a `401 Unauthorized` response
// header('WWW-Authenticate: Basic realm="Top Secret Files"');
// header("HTTP/1.0 401 Unauthorized");

// https://www.php.net/manual/en/features.http-auth.php

$auth_ok = false;

$user = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

if (isset($user) && isset($password) && $user === strrev($password)) {
    $auth_ok = true;
}

if (!$auth_ok) {
    header('WWW-Authenticate: Basic realm="Top Secret Files"');
    header('HTTP/1.0 401 Unauthorized');
    // anything else printed here is only seen if the client hits "Cancel"
    echo 'Text to send if user hits Cancel button';
    exit;
}

// Your password-protected document goes here
echo "Logged in!";
