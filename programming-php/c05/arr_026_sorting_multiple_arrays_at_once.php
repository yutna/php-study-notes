<?php

header('Content-Type: text/plain');

// The `array_multisort()` function sorts multiple indexed arrays at once.
// array_multisort(array1 [, array2, ...]);
// Pass it a series of arrays and sorting orders (Identified by the SORT_ASC or
// SORT_DESC constants), and it reorders the elements of all the arrays,
// assigning new indices.

// The first element of each array represent single record.
// The array_multisort() function reorders the elements of the arrays but
// perserving the records.

// That is, If `Dick` ends up first in the `$names` array after the sort,
// the rest of `Dick`'s information will be first in the other arrays too.

$names = array('Tom', 'Dick', 'Harriet', 'Brenda', 'Joe');
$ages = array(25, 35, 29, 35, 35);
$zips = array(80522, '02140', 90210, 64141, 80522);

// Sort the records first ASC by age, then DESC by zip code
array_multisort($ages, SORT_ASC, $zips, SORT_DESC, $names, SORT_ASC);

for ($i = 0; $i < count($names); $i++) {
    echo "{$names[$i]}, {$ages[$i]}, {$zips[$i]}\n";
}

// Tom, 25, 80522
// Harriet, 29, 90210
// Joe, 35, 80522
// Brenda, 35, 64141
// Dick, 35, 02140

// สังเกตว่าพอ sort อายุ ASC จะได้ 25, 29 และจะเจอตัวซ้ำ 35, 35, 35 สามตัว คราวนี้ตัว
// function ก็ไปใช้ sort DESC ของ zip code มา sort ต่อทำให้ Joe ขึ้นเป็นคนแรก
