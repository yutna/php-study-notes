<?php
  $day = 'Monday';
  $offer = match($day) {
    'Monday' => '20% off chocolate',
    'Tuesday' => '20% off milk',
    'Saturday', 'Sunday' => '20% off mints',
    default => '10% off your entire order',
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Expression</title>
    <link rel="stylesheet" href="http://localhost/php-playground/section_a/c02/css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Offer on <?= $day ?></h2>
    <p><?= $offer ?></p>
  </body>
</html>
