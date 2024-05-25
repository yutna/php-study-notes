<?php

header('Content-Type: text/plain');

$author_id = 8;
$url = "http://localhost:3000/api/authors/{$author_id}";

$payload = array('author' => array('name' => 'Yutthana Na'));
$request_data = http_build_query($payload, '', '&');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_data);

$response = curl_exec($ch);
$result_info = curl_getinfo($ch);

var_dump($response);
var_dump($result_info);

curl_close($ch);
