<?php

$bigLongVariableName = "PHP";
$short = &$bigLongVariableName;
$bigLongVariableName .= " rocks!";
print "\$short is $short <br />";
print "Long is $bigLongVariableName";

print "<br />";

$short = "Programming $short";
print "\$short is $short <br />";
print "Long is $bigLongVariableName";

print "<br />";

$white = "snow";
$black = &$white;
unset($white);
print $black;

print "<br />";

function &retRef()
{
    $var = "PHP";
    return $var;
}

$v = &retRef();
print $v;
