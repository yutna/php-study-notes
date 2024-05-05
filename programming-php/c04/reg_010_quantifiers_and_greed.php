<?php

header("Content-Type: text/plain");

// Regular expression quantifiers are typically `greedy`
var_dump(preg_match("/(<.*>)/", "do <b>not</b> press the button", $captured));
var_dump($captured); // <b>not</b>

echo "\n------------------------------------------------------------------\n\n";

// Nongreedy quantifier use ? after greedy quantifier
// ?     -> ??
// *     -> *?
// +     -> +?
// {m}   -> {m}?
// {m,}  -> {m,}?
// {m,n} -> {m,n}?

// Here's how to match a tag using a nongreedy quantifier
var_dump(preg_match("/<.*?>/", "do <b>not</b> press the button", $captured));
var_dump($captured); // <b>

// Another, faster way
var_dump(preg_match("/<[^>]*>/", "do <b>not</b> press the button", $captured));
var_dump($captured); // <b>
