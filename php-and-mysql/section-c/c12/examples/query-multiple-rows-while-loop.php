<?php

declare(strict_types=1);

require '../my_cms/includes/database-connection.php';
require '../my_cms/includes/functions.php';

$sql = "SELECT forename, surname FROM member;";
$statement = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Multiple Rows While Loop</title>
</head>

<body>
    <?php while ($row = $statement->fetch()) { ?>
        <p>
            <?= html_escape($row['forename']) ?>
            <?= html_escape($row['surname']) ?>
        </p>
    <? } ?>
</body>

</html>
