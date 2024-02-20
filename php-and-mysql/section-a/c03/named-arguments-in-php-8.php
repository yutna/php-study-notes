<?php

declare(strict_types=1);

function calculate_cost(int $cost, int $quantity, int $discount = 0, int $tax = 20): float
{
    $cost = $cost * $quantity;
    $tax = $cost * ($tax / 100);

    return ($cost + $tax) - $discount;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Named Arguments in PHP 8</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Dark chocolate: &dollar;<?= calculate_cost(quantity: 10, cost: 5, tax: 5, discount: 2) ?></p>
    <p>Milk chocolate: &dollar;<?= calculate_cost(quantity: 10, cost: 5, tax: 5) ?></p>
    <p>White chocolate: &dollar;<?= calculate_cost(5, 10, tax: 5) ?></p>
</body>

</html>
