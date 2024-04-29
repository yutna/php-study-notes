<?php

$bigLongVariableName = "PHP";
$short = &$bigLongVariableName;
$bigLongVariableName .= " rocks!";
print "\$short is $short <br />"; // $short is PHP rock!
print "Long is $bigLongVariableName"; // Long is PHP rock!

print "<br />";

$short = "Programming $short";
print "\$short is $short <br />"; // $short is Programming PHP rock!
print "Long is $bigLongVariableName"; // Long is Programming PHP rock!

print "<br />";

$white = "snow";
$black = &$white;
unset($white);
print $black; // snow

print "<br />";

function &retRef()
{
    $var = "PHP";
    return $var;
}

$v = &retRef();
print $v; // PHP
