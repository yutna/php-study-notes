<?php $home_url = PHP_OS === 'Darwin' ? 'http://php-playground.test' : 'http://localhost/php-playground'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chapter 9 Examples</title>
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="page">
        <header>
            <a href="<?= $home_url ?>">
                <img alt="Mountain Art Supplies" src="images/logo.png" height="90">
            </a>
        </header>
        <section>
