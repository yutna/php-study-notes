<?php

// NOTE
// ถ้าเราต้องการ convert string back กลับไปเป็น original string ตามเดิม
// เราจะใช้ get_html_translation_table() function ในการ list พวก entities ต่างๆ
// ถ้าเราต้องการ convert string back จาก htmlentities() ให้ใช้ get_html_translation_table(HTML_ENTITIES);
// ถ้าเราต้องการ convert string back จาก htmlspecialchars() ให้ใช้ get_html_translation_table(HTML_SPECIALCHARS);
// ดูตัวอย่างข้างล่าง

$str = htmlentities("Einstürzende Neubauten");
$table = get_html_translation_table(HTML_ENTITIES);
$replace_pairs = array_flip($table); // แปลง value ไปเป็น key, key ไปเป็น value คือจับ key, value สับตำแหน่งกันใน associative array
echo strtr($str, $replace_pairs); // Einst&uuml;rzende Neubauten -> Einstürzende Neubauten
echo "<br />";

// TRICK:
// เรารู้ว่าฟังก์ชั่น htmlentities() จะไม่แปลง space (" ") ไปเป็น &nbsp;
// ถ้าเราต้องการให้มันแปลงด้วยเราสามารถใช้ technique นี้ได้
$table = get_html_translation_table(HTML_ENTITIES);
$table[' '] = '&nbsp;';
$encoded = strtr("Einstürzende Neubauten", $table); // Einst&uuml;rzende&nbsp;Neubauten
echo $encoded;
