<?php
  $prefix = 'Thank you';
  $name = 'Yutna';
  // $message = $prefix . ', ' . $name;
  $message = "$prefix, $name";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Operator</title>
    <link rel="stylesheet" href="http://localhost/php-playground/section_a/c01/css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2><?= $name ?>'s Order</h2>
    <p><?= $message ?></p>
  </body>
</html>
