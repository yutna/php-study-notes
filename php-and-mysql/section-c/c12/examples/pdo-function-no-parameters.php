<?php

declare(strict_types=1);

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';

$sql = "SELECT forename, surname, email FROM member";
$members = pdo($pdo, $sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO functions NO parameters</title>
</head>

<body>
    <?php foreach ($members as $member) { ?>
        <p>
            <?= html_escape($member['forename']) ?>
            <?= html_escape($member['surname']) ?>
            <?= html_escape($member['email']) ?>
        </p>
    <?php } ?>
</body>

</html>
