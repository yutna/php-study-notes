<?php

declare(strict_types=1);

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';

$sql = "SELECT forename, surname
        FROM member
        WHERE id = 4;";

$statement = $pdo->query($sql);
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
    <title>Checking for Data</title>
</head>

<body>
    <p>
        <?= html_escape($member['forename']) ?>
        <?= html_escape($member['surname']) ?>
    </p>
</body>

</html>
