<?php

declare(strict_types=1);
require_once 'contents/php-and-mysql.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Playground</title>
</head>

<body>
    <?= get_php_and_mysql_contents($php_and_mysql_data) ?>
</body>

</html>
