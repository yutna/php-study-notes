<?php

declare(strict_types=1);

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';
require 'classes/Member.php';

$sql = "SELECT forename, surname FROM member WHERE id = 1;";
$statement = $pdo->query($sql);
$statement->setFetchMode(PDO::FETCH_CLASS, 'Member');
$member = $statement->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetching data into class</title>
</head>

<body>
    <p><?= html_escape($member->getFullName()) ?></p>
</body>

</html>
