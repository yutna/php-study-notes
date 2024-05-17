<?php
session_start();

$color = $_SESSION['fg'];
$background_color = $_SESSION['bg'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions - Color Preferences with sessions</title>
    <style>
        body {
            color: <?= $color ?>;
            background-color: <?= $background_color ?>;
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
        <a href="web_016_sessions.php">Change your preferences?</a>
    </p>
</body>

</html>
