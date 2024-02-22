<?php $text = 'Total: €444'; ?>

<?php include 'includes/header.php'; ?>

<strong>Character count using <code>strlen()</code>:</strong>
<br>
<?= strlen($text) ?>
<br>

<strong>Character count using <code>mb_strlen()</code>:</strong>
<br>
<?= mb_strlen($text) ?>
<br>

<strong>First match of 444 <code>strpos()</code>:</strong>
<br>
<?= strpos($text, '444') ?>
<br>

<strong>First match of 444 <code>mb_strpos()</code>:</strong>
<br>
<?= mb_strpos($text, '444') ?>
<br>

<?php include 'includes/footer.php'; ?>
