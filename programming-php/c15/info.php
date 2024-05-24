<?php

ob_start();

$start = microtime(true);

phpinfo();

$end = microtime(true);

ob_end_clean();


echo "phpinfo() took" . ($end - $start) . " seconds to run.";
