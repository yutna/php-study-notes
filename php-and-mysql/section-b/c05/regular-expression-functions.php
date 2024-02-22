<?php
$text = 'Using PHP\'s regular expression functions';
$path = 'code/section_b/c05/';

$match = preg_match('/PHP/', $text); // 1
$path = preg_split('/\//', $path); // ['code', 'section_b', 'c05']
$text = preg_replace('/PHP/', '<em>PHP</em>', $text); // 'Using <em>PHP</em>\'s regular expression functions'
?>

<?php include 'includes/header.php'; ?>

<strong>Was a match found?</strong>
<br>
<?= ($match === 1) ? 'Yes' : 'No' ?>
<br>
<br>

<strong>Parts of path:</strong>
<br>
<?php foreach ($path as $part) { ?>
    <?= $part ?>
    <br>
<?php } ?>

<strong>Updated text:</strong>
<?= $text ?>

<?php include 'includes/footer.php'; ?>
