<?php

header('Content-Type: text/plain');

// sprintf is the same as printf but it returns the build up string instead
// of printing it.
$date = sprintf('%02d/%02d/%04d', 4, 14, 1990);
print($date);
