<?php

declare(strict_types=1);

require '../my_cms/includes/database-connection.php';
require '../my_cms/includes/functions.php';

$sql = "SELECT id, forename, surname, joined, picture FROM member";
$statement = $pdo->query($sql);
$members = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatting Data in HTML</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php foreach ($members as $member) { ?>
        <div class="member-summary">
            <img alt="<?= html_escape($member['forename']) ?>" class="profile" src="../my_cms/uploads/<?= html_escape($member['picture'] ?? 'blank-member.png') ?>">
            <h2><?= html_escape($member['forename'] . ' ' . $member['surname']) ?></h2>
            <p>
                Member since:
                <br>
                <?= format_date($member['joined']) ?>
            </p>
        </div>
    <?php } ?>
</body>

</html>
