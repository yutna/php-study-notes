<?php

header('Content-Type: text/plain');

// Windows text files have lines that end in \r\n, whereas Unix text files have
// lines that end in \n. PHP processes files in binary mode, so it does NOT
// automatically convert from Windows line terminators to their Unix equivalents

// PHP on Windows sets the standard output, standard ipnut, and standard error
// file handlers to binary mode and thus does NOT do any translations for you.
// This is important for handling the binary input often associated with POST
// messages from web servers.

// Your program's output goes to standard output, and you will have to
// specifically place Windows line terminators in the output stream if you want
// them there. One way to handle this is to define an end-of-line (EOL) constant
// and output function that use it:

if (PHP_OS === 'WIN32' || PHP_OS === 'WINNT') {
    define('EOL', "\r\n");
} else if (PHP_OS === 'LINUX') {
    define('EOL', "\n");
} else {
    define('EOL', "\n");
}

function ln($out)
{
    echo $out . EOL;
}

ln("this line will have the server platform's EOL character");
