<?php

header("Content-Type: text/plain");

// To find any character that's a digit, an uppercase letter or an '@'
var_dump(preg_match("/[@[:digit:][:upper:]]/", "@1a", $captured)); // true (1)
var_dump($captured);

echo "\n------------------------------------------------------------------\n\n";

// Some locales consider certain character sequences as if they were a single
// character, these are called `collating sequences`.
// To match one of these multicharacter sequences in `a character` class,
// enclose it with [. and .]
// For example [st[.ch.]]
// Your locale has the collating sequence `ch`, you can match s, t or ch with
// this character class
// var_dump(preg_match("/[st[.ch.]]/", "s"));
// ลองทำตามตัวอย่างแต่มันขึ้นว่า Compilation failed: POSIX collating elements are not supported 🤔

// The Equivalence class, you can specify by enclosing the character within
// [= and =]. Equivalence classes match characters that have the same collating
// order, as defined in the current locale. For example, a locale may define
// A, Á, Ä as having the same sorting precedence. To match any one of theme,
// the equivalence class is [=a=]

// var_dump(preg_match("/[[=A=]]/", "Ä"));
// ลองทำตามตัวอย่างแต่มันขึ้นว่า Compilation failed: POSIX collating elements are not supported 🤔

// [:alnum:] === [0-9a-zA-Z]
// [:alpha:] === [a-zA-Z]
// [:ascii:] === [\x01-\x7F]
// [:blank:] === [ \t] (space, tab)
// [:cntrl:] === [x01-\x1F] (Control characters)
// [:digit:] === [0-9]
// [:graph:] === [^\x01-\x20] (Character that use ink to print) (nonspace, noncontrol)
// [:lower:] === [a-z]
// [:upper:] === [A-Z]
// [:space:] === [\n\r\t \x0B] (Whitespace) (newline, carriage return, tab, space, vertical tab)
// [:xdigit:] === [0-9a-fA-F] (Hexadecimal digit)
// [:print:] === [\t\x20-\xFF] (Printable character, graph class plus space and tab)
// [:punct:] === [-!"#$%&'()*+,./:;<=>?@[\\\]^_'{|}~] (Any punctuation character, such as the period (.) and the semicolon (;))

// \s === [\r\n \t] (Whitespace)
// \S === [^\r\n \t] (Nonwhitespace)
// \w === [0-9A-Za-z_] (Word (identifier) character)
// \W === [^0-9A-Za-z_] (Noword (identifier) character)
// \d === [0-9] (Digit)
// \D === [^0-9] (Nondigit)

var_dump(preg_match("/[[:alnum:]]/", "yutna1234", $captured));
var_dump($captured); // y
