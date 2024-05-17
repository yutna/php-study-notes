<?php

header('Content-Type: text/plain');

// Making a connection
$db = new mysqli("localhost", "root", "secret", "library");

// Query
$sql = <<<SQL
SELECT a.name, b.title
FROM books b, authors a
WHERE a.authorid = b.authorid;
SQL;

$result = $db->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "{$row['name']} is the author of: {$row['title']}\n";
}

// Closing a connection
$result->close();
$db->close();
