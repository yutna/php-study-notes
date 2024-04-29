<?php

$names = array("Fred", "Barney", "Wilma", "Betty");

function &find_one($n)
{
    global $names;
    return $names[$n];
}

$person = &find_one(1);
$person = "Barnetta"; // changes $names[1];

var_dump($names); // ["Fred", "Barnetta", "Wilma", "Betty"]
