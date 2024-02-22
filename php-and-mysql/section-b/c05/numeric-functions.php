<?php include 'includes/header.php'; ?>

<strong>Round:</strong>
<?= round(9876.54321) ?>
<br>

<strong>Round to two decimal places:</strong>
<?= round(9876.54321, 2) ?>
<br>

<strong>Round half up:</strong>
<?= round(1.5, 0, PHP_ROUND_HALF_UP) ?>
<br>

<strong>Round half down:</strong>
<?= round(1.5, 0, PHP_ROUND_HALF_DOWN) ?>
<br>

<strong>Round up:</strong>
<?= ceil(1.23) ?>
<br>

<strong>Round down:</strong>
<?= floor(1.23) ?>
<br>

<strong>Random number:</strong>
<?= mt_rand(50, 100) ?>
<br>

<strong>Exponential:</strong>
<?= pow(4, 5) ?>
<br>

<strong>Square root:</strong>
<?= sqrt(16) ?>
<br>

<strong>Is a number:</strong>
<?= is_numeric(123) ?>
<br>

<strong>Format number</strong>
<?= number_format(12345.6789, 2) ?>
<br>

<?php include 'includes/footer.php'; ?>
