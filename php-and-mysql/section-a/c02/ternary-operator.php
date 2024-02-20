<?php
$stock = 0;
$message = ($stock > 0) ? 'In Stock' : 'More stock coming soon';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ternary Operator</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Shop</h1>
    <h2>Chocolate</h2>
    <p><?= $message ?></p>
</body>

</html>
