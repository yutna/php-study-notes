<?php

header('Content-Type: text/plain');

// Positive -> the next/preceding text must be like this
// Negative -> the next/preceding text must NOT be like this

// (?=subpattern)  -> Positive lookahead
// (?!subpattern)  -> Negative lookahead
// (?<=subpattern) -> Positive lookbehind
// (?<!subpattern) -> Negative lookbehind

$mailbox = <<<MAILBOX
From a1@example.com
To b1@example.com

From a2@example.com
To b2@example.com
MAILBOX;

var_dump(preg_split('/(?=^From )/m', $mailbox));

echo "\n-------------------------------------------------\n\n";

$input = <<<END
name = 'Tom O\'Reilly';
END;

$pattern = <<<END
' # opening quote
( # begin capturing
 .*? # the string
 (?<! \\\\ ) # skip escaped quotes
) # end capturing
' # closing quote
END;

preg_match("($pattern)x", $input, $captured);
var_dump($captured); // Tom O\'Reilly

// RECHECk: เข้าใจแบบไม่ clear 100% แถมตัวอย่างที่ให้มาน้อยและยาก
