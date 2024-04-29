<?php

$foo = "bar";
$$foo = "baz";

echo $bar; // baz
