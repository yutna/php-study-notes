<?php

header('Content-Type: text/plain');

// PHP understands the use of backward or forward slashes on Windows platform,
// and even handle paths that use both.

$fh1 = fopen("c:/Users/yutth/.gitconfig", "r");
echo fread($fh1, filesize("c:/Users/yutth/.gitconfig"));
fclose($fh1);

$fh2 = fopen("c:\\Users\\yutth\\.gitconfig", "r");
echo fread($fh2, filesize("c:\\Users\\yutth\\.gitconfig"));
fclose($fh2);
