<?php

declare(strict_types=1);

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';

$sql = "SELECT id, forename, surname, email FROM member";
$statement = $pdo->query($sql);
$statement->setFetchMode(PDO::FETCH_OBJ);
$members = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetching Data as Objects</title>
</head>

<body>
    <?php foreach ($members as $member) { ?>
        <p>
            <?= html_escape($member->forename) ?>
            <?= html_escape($member->surname) ?>
            <?= html_escape($member->email) ?>
        </p>
    <?php } ?>
</body>

</html>
