<?php

header("Content-Type: text/plain");

// A caret (^) at the beginning of a regular expression indicates that it must
// match the beginning of the string
var_dump(preg_match("/^cow/", "Dave was a cowhand")); // false (0)
var_dump(preg_match("/^cow/", "cowabunga!")); // true (1)

// A dollar sign ($) at the end of a regular expression means that it must match
// the end of the string
var_dump(preg_match("/cow$/", "Dave was a cowhand")); // false (0)
var_dump(preg_match("/cow$/", "Don't have a cow")); // true (1)

// Escape special characters with backslash
var_dump(preg_match('/\$5.00/', "Your bill is $5.00 exactly")); // true (1)
var_dump(preg_match("/\$5.00/", "Your bill is $5.00 exactly")); // false (0)
var_dump(preg_match("/$5.00/", "Your bill is $5.00 exactly")); // false (0)

// จริงๆบรรทัดที่ 17 มันต้อง return true สิ LOL PHP 🤔🤯🤣
