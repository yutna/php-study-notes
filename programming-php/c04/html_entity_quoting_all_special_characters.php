<?php

// NOTE:
// Open devtools -> view source code -> you will see:
// Einst&uuml;rzende Neubauten
// The "ü" will be changed to this entity "&uuml;" instead
// **The htmlentities() function does NOT convert space to &nbsp;
$string = htmlentities("Einstürzende Neubauten");
echo $string;
echo "<br />";

$input = <<<END
"Stop pulling my hair!" Jane's eyes flashed.<p>
END;

// Convert only double quote
$double = htmlentities($input, ENT_COMPAT); // &quot;Stop pulling my hair!&quot; Jane's eyes flashed.&lt;p&gt;
echo $double;
echo "<br />";

// Convert both double quote and single quote
$both = htmlentities($input, ENT_QUOTES); // &quot;Stop pulling my hair!&quot; Jane&#039;s eyes flashed.&lt;p&gt;
echo $both;
echo "<br />";

// No convert double quote, No convert single quote
$neither = htmlentities($input, ENT_NOQUOTES); // "Stop pulling my hair!" Jane's eyes flashed.&lt;p&gt;
echo $neither;
