<?php
$home_url = PHP_OS === 'Darwin' ? 'http://php-playground.test' : 'http://localhost/php-playground';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 6: Getting Data from Browsers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="content">
        <div class="page">
            <header>
                <a href="<?= $home_url ?>">
                    <img alt="Mountain Art Supplies" src="images/logo.png" height="90">
                </a>
            </header>
            <section>
