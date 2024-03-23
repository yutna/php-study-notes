<?php

declare(strict_types=1);

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';

$id = 1;
$sql = "SELECT forename, surname FROM member WHERE id = :id;";
$statement = $pdo->prepare($sql);
$statement->execute(['id' => $id]);
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
    <title>Prepared Statement</title>
</head>

<body>
    <p>
        <?= html_escape($member['forename']) ?>
        <?= html_escape($member['surname']) ?>
    </p>
</body>

</html>
