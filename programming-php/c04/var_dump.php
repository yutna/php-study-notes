<?php

header('Content-Type: text/plain');

var_dump(true);
var_dump(false);
var_dump(null);
var_dump(array('name' => 'Fred', 'age' => 35));

class P
{
    var $name = 'Nat';
}

$p = new P();
var_dump($p);
