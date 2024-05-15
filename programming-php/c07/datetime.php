<?php

header('Content-Type: text/plain');

$dtz = new DateTimeZone('Asia/Bangkok');
$dt = new DateTime('2019-06-27 16:42:33', $dtz);

echo "date: " . $dt->format('Y-m-d h:i:s');

echo "\n\n----------------------------------------------------------------\n\n";

// เราสามารถ pass string `now` ได้
$dt = new DateTime('now', $dtz);
echo "date: " . $dt->format("Y-m-d h:i:s");

echo "\n\n----------------------------------------------------------------\n\n";

// The `diff()` method returns the difference between two dates (DateTime).
// The return value of the method is an instance of the `DateInterval` class.

$past = new DateTime('2019-02-12 16:42:33', $dtz);
$current = new DateTime('now', $dtz);

$diff = $past->diff($current);

$past_string = $past->format('Y-m-d');
$current_string = $current->format('Y-m-d');
$diff_string = $diff->format('%yy %mm, %dd');

echo "Difference between {$past_string} and {$current_string} is {$diff_string}";

// พวก format สัญลักษณ์ต่างๆให้กลับไปเช็คที่หนังสือหรือเช็คที่เว็บ PHP เอานะ ไม่อยากเขียนสรุปมันยาวมาก

echo "\n\n----------------------------------------------------------------\n\n";

// You can get more information from the time zone object using the
// `getLocation()` method. It provides the country of origin of the time zone,
// the longitude and the latitude, plus some comments. With these few lines of
// code, you can have the beginnings of a web-based GPS system.

echo "Time zone: " . $dtz->getName() . "\n"; // Time zone: Asia/Bangkok

foreach ($dtz->getLocation() as $key => $value) {
    echo "{$key} {$value}\n";
}

// country_code TH
// latitude 13.75
// longitude 100.51666
// comments

// A list of valid time zone names by global regions can be found in the PHP
// online manual: https://www.php.net/manual/en/timezones.php 📝
