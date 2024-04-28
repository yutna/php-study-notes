<?php

header("Content-Type: text/plain");

// $string = implode(separator, array);

$fields = array("Fred", "25", "Wilma");
$string = implode(",", $fields);
echo $string;
echo "\n";

// The join function is an alias for implode();
echo join("-", $fields);
