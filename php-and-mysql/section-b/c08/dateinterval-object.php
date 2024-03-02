<?php
$today = new DateTime();
$event = new DateTime();
$event->modify('+3 months');
$countdown = $today->diff($event);
// $countdown = $event->diff($today);

$earlybird = new DateTime();
$interval = new DateInterval('PT12H');
$earlybird->add($interval);
?>

<?php include 'includes/header.php'; ?>

<p>
    <b>Countdown to event:</b>
    <br>
    <?= $countdown->format('%y years %m months %d days') ?>
</p>

<p>
    <b>50% off tickets bought by:</b>
    <br>
    <?= $earlybird->format('D d M Y, g:i a') ?>
</p>

<?php include 'includes/footer.php'; ?>
