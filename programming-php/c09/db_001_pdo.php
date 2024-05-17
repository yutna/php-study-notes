<?php

header('Content-Type: text/plain');

// Making a connection
$type = 'mysql';
$server = 'localhost';
$db = 'library';
$port = '3306';
$charset = 'utf8mb4';
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";

try {
    $db = new PDO($dsn, 'root', 'secret');
} catch (Exception $error) {
    die("Connection failed: " . $error->getMessage());
}

// Interactive with the database
$rows = $db->query('SELECT * FROM books');

foreach ($rows as $row) {
    echo $row['title'] . "({$row['pub_year']})\n";
}

echo "\n\n----------------------------------------------------------------\n\n";

// Using PDO and prepared statements
$statement = $db->prepare('SELECT * FROM books');
$statement->execute();

while ($row = $statement->fetch()) {
    echo $row['title'] . "({$row['pub_year']})\n";
}

echo "\n\n----------------------------------------------------------------\n\n";

// Debugging statements
$statement->debugDumpParams();

// $sql = <<<SQL
// INSERT INTO books (authorid, title, ISBN, pub_year, available)
// VALUES (:authorid, :title, :ISBN, :pub_year, :available);
// SQL;

// $statement = $db->prepare($sql);
// $statement->execute([
//     'authorid' => 4,
//     'title' => 'Get Programming with Go',
//     'ISBN' => '0-664-91482-0',
//     'pub_year' => 2018,
//     'available' => 1,
// ]);

echo "\n\n----------------------------------------------------------------\n\n";

// Handing transactions
// try {
//     $db->beginTransaction();

//     $db->exec("INSERT INTO accounts (account_id, amount) VALUES (23, '5000')");
//     $db->exec("INSERT INTO accounts (account_id, amount) VALUES (27, '-5000')");

//     $db->commit();
// } catch (Exception $error) {
//     $db->rollBack();
//     echo "Transaction not completed: " . $error->getMessage();
// }

// NOTE: ตัวอย่างการใช้งาน PDO เต็มๆไปดูที่ folder `php-and-mysql` ได้เลย
// หนังสือเล่มนี้ไม่ค่อยละเอียดนัก
