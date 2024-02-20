<?php
$stock = 0;

if ($stock > 0) {
    $message = 'In Stock';
} else {
    $message = 'More stock coming soon';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF-ELSE Statement</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    <p><?= $message ?></p>
</body>

</html>
