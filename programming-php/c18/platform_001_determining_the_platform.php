<?php

header('Content-Type: text/plain');

// PHP_OS -> 'HP-UX', 'Darwin', 'Linux', 'SunOS', 'WIN32', 'WINNT'
if (PHP_OS === 'WIN32' || PHP_OS === 'WINNT') {
    echo "You are on a Windows system.\n";
} else {
    echo "You are NOT on a Windows system\n";
}

// The `php_uname()` is a built-in function, its returns even more OS info.
echo php_uname(); // Windows NT YUTTHANA-PC 10.0 build 22631 (Windows 11) AMD64
