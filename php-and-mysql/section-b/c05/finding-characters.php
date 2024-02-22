<?php $text = 'Home sweet home'; ?>

<?php include 'includes/header.php' ?>

<strong>First match (case-sensitive):</strong>
<?= strpos($text, 'ho') ?>
<!-- 11 -->
<br>

<strong>First match (not case-sensitive):</strong>
<?= stripos($text, 'me', 5) ?>
<!-- 13 -->
<br>

<strong>Last match (case-sensitive):</strong>
<?= strrpos($text, 'Ho') ?>
<!-- 0 -->
<br>

<strong>Last match (not case-sensitive):</strong>
<?= strripos($text, 'Ho') ?>
<!-- 11 -->
<br>

<strong>Text after first match (case-sensitive):</strong>
<?= strstr($text, 'ho') ?>
<!-- home -->
<br>

<strong>Text after first match (not case-sensitive):</strong>
<?= stristr($text, 'ho') ?>
<!-- Home sweet home -->
<br>

<strong>Text between two positions:</strong>
<?= substr($text, 5, 3) ?>
<!-- swe -->
<br>

<?php include 'includes/footer.php' ?>
