<?php $home_url = PHP_OS === 'Darwin' ? 'http://php-playground.test' : 'http://localhost/php-playground'; ?>

<!DOCTYPE html>
<html lang="en">

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

        <nav>
            <a href="home.php">Home</a>
            <a href="products.php">Products</a>
            <a href="account.php">My Account</a>
            <?= $logged_in ? '<a href="logout.php">Log Out</a>' : '<a href="login.php">Log In</a>' ?>
        </nav>
        <section>
