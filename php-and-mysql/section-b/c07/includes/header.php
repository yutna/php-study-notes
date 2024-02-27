<?php
$home_url = PHP_OS === 'Darwin' ? 'http://php-playground.test' : 'http://localhost/php-playground';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 7 - Images and Files</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
</head>

<body>
    <div class="page">
        <header>
            <a href="<?= $home_url ?>">
                <img alt="Mountain Art Supplies" height="90" src="images/logo.png">
            </a>
        </header>
        <section>
