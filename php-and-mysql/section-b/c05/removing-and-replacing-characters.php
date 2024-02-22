<?php $text = '/images/uploads/'; ?>

<?php include 'includes/header.php'; ?>

<strong>Remove '/' from both ends:</strong>
<br>
<?= trim($text, '/') ?>
<br>

<strong>Remove '/' from the left of the string:</strong>
<br>
<?= ltrim($text, '/') ?>
<br>

<strong>Remove 's/' from the right of the string:</strong>
<br>
<?= rtrim($text, 's/') ?>
<br>

<strong>Replace 'images' with 'img'</strong>
<br>
<?= str_replace('images', 'img', $text) ?>
<br>

<strong>As above but case-insensitive:</strong>
<br>
<?= str_ireplace('IMAGES', 'img', $text) ?>
<br>

<strong>Repeat the string:</strong>
<br>
<?= str_repeat($text, 2) ?>
<br>

<?php include 'includes/footer.php'; ?>
