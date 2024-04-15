<?php

// พวก operator comparison มีกฏการแปลงค่าระหว่าง number กับ string ดังนี้ จำง่ายๆ
// ถ้า string ไม่ได้ประกอบเป็นตัวเลขเพียงอย่างเดียว จะ compare ค่านั้นแบบ string ทันที (lexicographic)

// var_dump("1E3" == 1000); // true
// var_dump("123abc" == 123); // false

// ในกรณีที่ค่า string มีแต่ตัวเลข เช่น "123" แต่ไม่อยากให้ PHP convert เป็นตัวเลขแล้วนำมา compare กัน
// อยากให้ compare แบบ string แทน ให้ใช้ strcmp() function
var_dump(strcmp("0123", "123")); // -1
