<?php
$tz_LDN = new DateTimeZone('Europe/London');
$tz_TYO = new DateTimeZone('Asia/Tokyo');
$tz_BKK = new DateTimeZone('Asia/Bangkok');

$location = $tz_BKK->getLocation();

$LDN = new DateTime('now', $tz_LDN);
$TYO = new DateTime('now', $tz_TYO);
$BKK = new DateTime('now', $tz_BKK);
$SYD = new DateTime('now', new DateTimeZone('Australia/Sydney'));
?>

<?php include 'includes/header.php'; ?>

<p>
    <b>LDN: <?= $LDN->format('g:i a') ?></b>
    (<?= $LDN->getOffset() / (60 * 60) ?>)<br>
    <b>TYO: <?= $TYO->format('g:i a') ?></b>
    (<?= $TYO->getOffset() / (60 * 60) ?>)<br>
    <b>BKK: <?= $BKK->format('g:i a') ?></b>
    (<?= $BKK->getOffset() / (60 * 60) ?>)<br>
    <b>SYD: <?= $SYD->format('g:i a') ?></b>
    (<?= $SYD->getOffset() / (60 * 60) ?>)<br>
</p>

<h1>Head Office</h1>
<p>
    <?= $tz_LDN->getName() ?><br>
    <b>Logitude:</b> <?= $location['longitude'] ?><br>
    <b>Latitude:</b> <?= $location['latitude'] ?>
</p>

<?php include 'includes/footer.php'; ?>
