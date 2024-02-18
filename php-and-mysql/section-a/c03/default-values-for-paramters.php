<?php
  declare(strict_types = 1);

  function calculate_cost(int | float $cost, int $quantity, int | float $discount = 2): int | float
  {
    $cost = $cost * $quantity;
    return $cost - $discount;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default Values for Parameters</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Dark chocolate: &dollar;<?= calculate_cost(5, 10, 7) ?></p>
    <p>Milk chocolate: &dollar;<?= calculate_cost(3, 4) ?></p>
    <p>White chocolate: &dollar;<?= calculate_cost(4, 15, 20) ?></p>
  </body>
</html>
