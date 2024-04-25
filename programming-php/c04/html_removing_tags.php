<?php

$input = '<p>Howdy, &quot;Cowboy&quot;</p>';
$output = strip_tags($input); // Howdy, &quot;Cowboy&quot;
echo $output;
echo "<br />";

// ถ้าอยากเก็บแท็กไหนไว้ให้ใส่ใน arguement ตัวที่สอง (ใส่เฉพาะ tag เปิด tag ปิดไม่ต้องใส่)
$input = "The <b style=\"color: red;\">bold</b> tags <em style=\"font-weight: bold;\">will</em> <i>stay</i><p>";
$output = strip_tags($input, "<b>");
echo $output;
