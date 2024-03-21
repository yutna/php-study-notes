<?php

declare(strict_types=1);

require '../my_cms/includes/database-connection.php';
require '../my_cms/includes/functions.php';

$sql = "
SELECT forename, surname
FROM member
WHERE id = 1;
";

$statement = $pdo->query($sql);
$member = $statement->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query One Row</title>
</head>

<body>
    <p>
        <?= html_escape($member['forename']) ?>
        <?= html_escape($member['surname']) ?>
    </p>
</body>

</html>
