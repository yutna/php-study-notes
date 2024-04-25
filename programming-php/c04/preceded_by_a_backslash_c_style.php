<?php

header("Content-Type: text/plain");

// ตัวอย่างการใช้ addcslashes (C-String Encoding) ด้วยการกำหนด range
// ของตัวอักษรที่จะ escaped เราสามารถกำหนด range of characters to escape
// ด้วย ".." construct

$escaped_c_string_encoding = addcslashes("hello\tworld\n", "\x00..\x1fz..\xff");
echo $escaped_c_string_encoding;
echo "\n";

$decoded_c_string = stripcslashes($escaped_c_string_encoding);
echo $decoded_c_string;
echo "\n";

// NOTE
// ในหนังสือให้ระวังที่ใช้ตัวอักษรเหล่านี้ในการระบุ range ซึ่งมี
// '0', 'a', 'b', 'f', 'n', 'r', 't', or 'v'
// ซึ่งพอ escaped แล้วมันจะ string เช่น '\a' ซึ่งอาจทำให้ interpreter เกิดความสับสนได้
// ลองไปอ่าน official doc ก็ได้ เขียนในทำนองเดียวกับหนังสือเป๊ะ
// https://www.php.net/manual/en/function.addcslashes.php
