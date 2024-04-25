<?php

// NOTE:
// ถ้าเราต้องการจะแสดงข้อมูลที่มาจาก input ของ user เช่น form เราจำเป็นต้องใช้ htmlspecialchars()
// ทุกครั้งก่อนที่จะทำการแสดงผลหรือบันทึกข้อมูลลง database เสมอ
// โดย htmlspecialchars() จะทำการแปลง entities เหล่าให้อยู่ในรูป valid HTML
// 1). Ampersands (&) -> &amp;
// 2). Double quotes (") -> &quot;
// 3). Single quotes (') -> &#039;
// 4). Less-than signs (<) -> &lt;
// 5). Greater-than signs (>) -> &gt;
// ในหนังสือเค้านิยามไว้ประมาณนี้
// This function converts the smallest set of entities possible to generate
// valid HTML


$string = htmlspecialchars("\"Stop pulling my hair!\" Jane's eyes flashed.<p>");
echo $string; // &quot;Stop pulling my hair!&quot; Jane&#039;s eyes flashed.&lt;p&gt;
echo "<br />";

$string = htmlspecialchars("Einstürzende Neubauten");
echo $string; // Einstürzende Neubauten -> สังเกตุว่าจะไม่มีการแปลง ü เหมือนฟังก์ชั่น htmlentities();
echo "<br />";
