<?php
  $products = [
    'toffee' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
  ];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOREACH Loop</title>
    <link rel="stylesheet" href="http://localhost/php-playground/section_a/c02/css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Price List</h2>
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $item => $price) { ?>
          <tr>
            <td><?= $item ?></td>
            <td>$<?= $price ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
