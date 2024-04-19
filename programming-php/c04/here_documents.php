<?php

// Add this header if you want to display text as you've laid it out
header('Content-Type: text/plain;');
// or this in php.ini
// ini_set('default_mimetype', 'text/plain');

// You can easily put miltiline strings into your program with a heredoc.
$clerihew = <<<ENDOFQUOTE
Sir Humphrey Davy
Abominated gravy
He lived in the odium
Of having discovered sodium.

ENDOFQUOTE;

echo $clerihew;

echo "\n--------------------------------------------------------------------\n";

// Use heredoc in complex expression
printf(
    <<<Template
%s is %d years old.
Template,
    "Fred",
    35
);

echo "\n--------------------------------------------------------------------\n";

// Single and double quotes in a heredoc are preserved.

$dialogue = <<<NOMORE
"It's not going to happen!" she fumed.
He raised an eyebow. "Want to bet?"
NOMORE;

echo $dialogue;

echo "\n--------------------------------------------------------------------\n";

// White space too.

$ws = <<<ENOUGH
 boo
 hoo
ENOUGH;

echo $ws;
