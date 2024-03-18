<?php include 'contents/php-and-mysql.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Playground</title>
    <style>
        body {
            color: white;
            background-color: black;
        }

        a:link {
            color: red;
        }

        a:visited {
            color: pink;
        }

        a:link:active,
        a:visited:active {
            color: salmon;
        }
    </style>
</head>

<body>
    <?= get_php_and_mysql_contents() ?>
</body>

</html>
