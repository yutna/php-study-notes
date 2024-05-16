<?php

// A server can explicitly inform the browser, and any proxy caches that might
// be between the server and browser, of a specific date and time for the
// document to expire.

// To set the expiration time of a document, use the `Expires` header.
// header('Expires: Tue, 02 Jul 2019 05:30:00 GMT');

// To force a document to expire three hours from the time the page was
// generated, use `time()` and `gmdate()` to generate the expiration date
// string.
// $now = time();
// $then = gmdate("D, d M Y H:i:s", $now + (60 * 60 * 3)) . " GMT";

// To indicate that a document "never" expires, use the time a year from now:
// $now = time();
// $then = gmdate("D, d M Y H:i:s", $now + (365 * 86440)) . " GMT";

// To mark a document as expired, use the current time or a time in the past:
// $then = gmdate("D, d M Y H:i:s", $now) . " GMT";

// This is the best way to prevent a browser or proxy cache from storing your
// document:
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Prama: no-cache");
