<?php

class Person
{
    public $name;

    function name($newname = null)
    {
        if (!is_null($newname)) {
            $this->name = $newname;
        }

        return $this->name;
    }
}

$ed = new Person();
$ed->name('Edition');
echo "Hello, {$ed->name} <br />";

$tc = new Person();
$tc->name('Crapper');
echo "Look out below {$tc->name} <br />";

if (is_object($ed)) {
    echo "ed is an object";
}
