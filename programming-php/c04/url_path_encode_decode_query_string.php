<?php

header("Content-Type: text/plain");

// NOTE:
// ในหนังสือบอกว่าวีธีในตัวอย่างข้างล่างนี้เหมาะกับ format ที่เอาไว้สร้าง query string และ cookie value.
// หรือ form-like URLs ในขณะฟังชั่นก์ rawurlencode และ rawurldecode เหมาะสำหรับ
// dynamically generating hypertext references for links in a page ดูตัวอย่างการใช้ raw
// ที่ไฟล์ url_path_encode_decode_rfc_3986.php

$base_url = 'http://www.google.com/q=';
$query = 'PHP sessions -cookies';
$encoded_query = urlencode($query); // PHP+sessions+-cookies
$url = $base_url . $encoded_query; // http://www.google.com/q=PHP+sessions+-cookies
echo $url;

echo "\n";

$decoded_query = urldecode($encoded_query); // PHP sessions -cookies
echo $decoded_query;
