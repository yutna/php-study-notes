<?php

declare(strict_types=1);

require '../my_cms/includes/database-connection.php';
require '../my_cms/includes/functions.php';

$id = 1;
$sql = "SELECT forename, surname FROM member WHERE id = :id;";
$statement = $pdo->prepare($sql);
$statement->bindValue('id', $id, PDO::PARAM_INT);
$statement->execute();
$member = $statement->fetch();

if (!$member) {
    include 'page-not-found.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bind Value</title>
</head>

<body>
    <p>
        <?= html_escape($member['forename']) ?>
        <?= html_escape($member['surname']) ?>
    </p>
</body>

</html>
