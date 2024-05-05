<?php

header('Content-Type: text/plain');

$better = preg_replace('/<.*?>/', '!', 'do <b>not</b> press the button');
var_dump($better); // "do !not! press the button

echo "\n------------------------------------------------------------------\n\n";

$names = array(
    'Fred Flintstone',
    'Barney Rubble',
    'Wilma Flintstone',
    'Betty Rubble'
);

$tidy = preg_replace('/(\w)\w* (\w+)/', '\1 \2', $names);
var_dump($tidy); // ['F Flintstone', 'B Rubble', 'W Flintstone', 'B Rubble']

echo "\n------------------------------------------------------------------\n\n";

$contractions = array("/don't/i", "/won't/i", "/can't/i");
$expansions = array('do not', 'will not', 'can not');
$string = "Please don't yell - I can't jump while you won't speak";
$longer = preg_replace($contractions, $expansions, $string);
var_dump($longer); // Please do not yell - I can not jump while you will not speak

echo "\n------------------------------------------------------------------\n\n";

$html_gunk = array('/<.*?>/', '/&.*?;/');
$html = '&eacute; : <b>very</b> cute';
$stripped = preg_replace($html_gunk, array(), $html);
var_dump($stripped); // " : very cute"

echo "\n------------------------------------------------------------------\n\n";

$stripped = preg_replace($html_gunk, '', $html);
var_dump($stripped); // " : very cute"

echo "\n------------------------------------------------------------------\n\n";

echo preg_replace('/(\w)\w+\s+(\w+)/', '$2, $1.', 'Fred Flintstone');
// Flintstone, F.

echo "\n------------------------------------------------------------------\n\n";

// NOTE: no support /e modifier in latest PHP version
// use preg_replace_callback() instead

// $string = 'It was 5C outside, 20C inside';
// echo preg_replace('/(\d+)C\b/e', '$1*9/5+32', $string);

function ctof($s)
{
    return ($s[1] * (9 / 5)) + 32;
}

$string = 'It was 5C outside, 20C inside';
echo preg_replace_callback('/(\d+)C\b/', 'ctof', $string);

echo "\n------------------------------------------------------------------\n\n";

// $name = 'Fred';
// $age = 35;
// $string = '$name is $age';
// echo preg_replace('/\$(\w+)/e', '$$1', $string);

function vv($s)
{
    return $GLOBALS[$s[1]];
}

$name = 'Fred';
$age = 35;
$string = '$name is $age';
echo preg_replace_callback('/\$(\w+)/', 'vv', $string);

echo "\n------------------------------------------------------------------\n\n";

function titlecase($s)
{
    return ucfirst(strtolower($s[0]));
}

$string = 'goodbye cruel world';
$new = preg_replace_callback('/\w+/', 'titlecase', $string);
echo $new;
