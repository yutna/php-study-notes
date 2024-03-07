<?php
include 'includes/functions.php';

$price = 12;
$exchange_rate = 0.8;

//$exchange_rate = 'four';
//$exchange_rate = new ExchangeRate();

$aud = $price + $exchange_rate;
?>

<?php include 'includes/header.php'; ?>
<p>Price: <?= $price ?></p>
<p>Price in AUD$: <?= $aud ?></p>
<?php include 'includes/footer.php'; ?>
