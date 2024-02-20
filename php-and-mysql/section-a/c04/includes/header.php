<?php
$home_url = PHP_OS === 'Darwin' ? 'http://php-playground.test' : 'http://localhost/php-playground';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 4 - Objects and Classes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <a href="<?= $home_url ?>">
            <img alt="Neo Bank" src="images/logo.png">
        </a>
    </header>
    <section>
