<?php $home_url = PHP_OS === 'Darwin' ? 'http://php-playground.test' : 'http://localhost/php-playground'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chapter 10 Examples</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="page">
        <header>
            <a href="<?= $home_url ?>">
                <img alt="Mountain Art Supplies" src="images/logo.png" height="90" />
            </a>
        </header>
        <section>
