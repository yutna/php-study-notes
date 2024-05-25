<?php

require_once 'lib/ResourceFactory.php';

header('Content-Type: text/plain');

// Retrieving information for a resource involves a straightforward GET request.
// Uses the `curl` extension to format an HTTP request, set parameters on it,
// send the request, and get the returned information.

$url = "http://localhost:3000/api/authors";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$authors = json_decode($response, true);

// Uncomment this when you need to debug to get request information.
// $result_info = curl_getinfo($ch);

curl_close($ch);

foreach ($authors as $author) {
    $author = ResourceFactory::authorFromJSON($author);
    echo "Author ID: {$author->id}, Author name: {$author->name}\n";
}
