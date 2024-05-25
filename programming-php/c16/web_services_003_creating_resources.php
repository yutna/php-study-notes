<?php

require_once 'lib/Author.php';

header('Content-Type: text/plain');

$url = 'http://localhost:3000/api/authors';

$author = new Author(['name' => 'Peter Macintyre']);
$payload = array('author' => array('name' => $author->name));
$request_data = http_build_query($payload, '', '&');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_data);
curl_setopt($ch, CURLOPT_POST, true);

$response = curl_exec($ch);
$result_info = curl_getinfo($ch);

var_dump($response);
var_dump($result_info);

curl_close($ch);
