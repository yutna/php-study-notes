<?php
  $us_price = 4;
  $rates = [
    'uk' => 0.81,
    'eu' => 0.93,
    'jp' => 113.21,
    'au' => 1.32,
  ];

  function calculate_prices($usd, $exchange_rates)
  {
    $prices = [
      'pound' => $usd * $exchange_rates['uk'],
      'euro' => $usd * $exchange_rates['eu'],
      'yen' => $usd * $exchange_rates['jp'],
      'australian_dollar' => $usd * $exchange_rates['au'],
    ];

    return $prices;
  }

  $global_prices = calculate_prices($us_price, $rates);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions with Multiple Values</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <h2>US $ <?= $us_price ?></h2>
    <p>
      (UK &pound; <?= $global_prices['pound'] ?> |
       EU &euro; <?= $global_prices['euro'] ?> |
       JP &yen; <?= $global_prices['yen'] ?>
       AU &dollar; <?= $global_prices['australian_dollar'] ?>)
    </p>
  </body>
</html>
