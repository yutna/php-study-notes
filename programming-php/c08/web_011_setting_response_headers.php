<?php

// The only catch to settings headers is that you must do so before any of the
// body is generated. This means that all calls to `header()` (or setcookie() if
// you are setting cookies) must happen at the very top of your file, even
// before the `<html>` tag.

header('Content-Type: text/plain');
// text/html ถ้าเป็น HTML document

// ในหนังสือบอกว่าให้ลองไปศึกษาเรื่อง output buffer: ob_start(), ob_end_flush() เพิ่มเติม
// อาจจะเป็นการที่ต้องใช้กรณีที่ต้องการ set header ทีหลังมั้งไม่แน่ใจ
?>

Date: today
From: fred
To: barney
Subject: hands off!

My lunchbox is mine alone. Get your own, you filthy scrounger!
