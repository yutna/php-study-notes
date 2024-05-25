<?php

header('Content-Type: text/plain');

$author_id = 11;
$url = "http://localhost:3000/api/authors/{$author_id}";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

$response = curl_exec($ch);
$result_info = curl_getinfo($ch);

var_dump($response);
var_dump($result_info);

curl_close($ch);
