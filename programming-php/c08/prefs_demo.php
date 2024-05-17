<?php
$background_name = $_COOKIE['bg'];
$foreground_name = $_COOKIE['fg'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies - Color Preferences with cookies</title>
    <style>
        body {
            color: <?= $foreground_name ?>;
            background-color: <?= $background_name ?>;
        }
    </style>
</head>

<body>
    <h1>Welcome to the Store</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde officia
        minus at deleniti? Dolores, fuga temporibus. Debitis sit, impedit minus
        ullam odit est nihil nesciunt, blanditiis itaque eaque ipsa dolorem.
    </p>

    <p>
        Would you like to
        <a href="web_015_cookies.php">Change your preferences?</a>
    </p>
</body>

</html>
