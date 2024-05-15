<?php

header('Content-Type: text/plain');

// Variables

// Server configuration and request information--including form parameters and
// cookies--are accessible in the three different ways from your PHP scripts.
// Collectively, this information is referred to as EGPCS (short for
// environment, GET, POST, cookies and server).

// PHP creates six global arrays that contain the EGPCS information.
// $_ENV -> contains the values of any environment variables.
// $_GET -> contains any parameters that are part of a GET request.
// $_POST -> contains any parameters that are part of a POST request.
// $_COOKIE -> contains any cookie values passed as part of the request.
// $_SERVER -> contains useful information about the web server.
// $_FILES -> contains information about any uploaded files.

// These variables are NOT only global, but also visible from within function
// definitions.

// THE $_REQUEST array is created by PHP automatically and contains the elements
// of the $_GET, $_POST, and $_COOKIE arrays all in one array variable.

// -----------------------------------------------------------------------------

// Server Information

// The $_SERVER array contains a lot of useful information from the web server,
// much of which comes from the environment variables required in the Common
// Gateway Interface (CGI) specification.

// PHP_SELF -> The name of the current script, relative to the document root.
var_dump($_SERVER['PHP_SELF']); // /programming-php/c08/web_001_basic.php

// SERVER_SOFTWARE -> A string that identifies the server.
var_dump($_SERVER['SERVER_SOFTWARE']); // nginx/1.25.4

// SERVER_NAME -> The hostname, DNS alias, or IP address for self-referencing
// URLs.
var_dump($_SERVER['SERVER_NAME']); // php-playground.test

// GATEWAY_INTERFACE -> The version of the CGI standard being followed.
var_dump($_SERVER['GATEWAY_INTERFACE']); // CGI/1.1

// SERVER_PROTOCOL -> The name and revision of the request protocol.
var_dump($_SERVER['SERVER_PROTOCOL']); // HTTP/1.1

// SERVER_PORT -> The server port number to which the request was sent
var_dump($_SERVER['SERVER_PORT']); // 80

// REQUEST_METHOD -> The method the client used to fetch the document
var_dump($_SERVER['REQUEST_METHOD']); // GET

// PATH_INFO -> Extra path elements given by the client e.g. /list/users
var_dump($_SERVER['PATH_INFO']); // ""

// PATH_TRANSLATED -> The value of PATH_INFO, translated by the server into a
// filename e.g. /home/httpd/htdocs/list/users
// var_dump($_SERVER['PATH_TRANSLATED']);

// SCRIPT_NAME -> The URL path to the current page, which is useful for
// self-referencing scripts
var_dump($_SERVER['SCRIPT_NAME']); // /programming-php/c08/web_001_basic.php
// ได้ผลลัพธ์เหมือน PHP_SELF เลยแฮ่ะ 🤔

// QUERY_STRING -> Everything after the ? in the URL
var_dump($_SERVER['QUERY_STRING']); // ""

// REMOTE_HOST -> The hostname of the machine that requested this page. If
// there's no DNS for the machine. this is blank and REMOTE_ADDR is the only
// information given.
// var_dump($_SERVER['REMOTE_HOST']);

// REMOTE_ADDR -> A string containing the IP address of the machine that
// requested this page.
var_dump($_SERVER['REMOTE_ADDR']); // 127.0.0.1

// AUTH_TYPE -> The authentication method used to protect the page, if the page
// is password protected. e.g. basic
// var_dump($_SERVER['AUTH_TYPE']);

// REMOTE_USER -> The username with which the client authenticated, if the page
// is password protected. Note that there's no way to find out what password was
// used.
// var_dump($_SERVER['REMOTE_USER']);

// Another useful header is
// HTTP_REFERER -> The page the browser said it came from to get to the current
// page.
var_dump($_SERVER['HTTP_REFERER']);
