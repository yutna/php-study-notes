<?php
$start = new DateTime('2025-01-01');
$end = new DateTime('2026-01-01');
$interval = new DateInterval('P3M');
$period = new DatePeriod($start, $interval, $end);
?>

<?php include 'includes/header.php'; ?>

<p>
    <?php foreach ($period as $event) { ?>
        <b><?= $event->format('l') ?></b>
        <?= $event->format('M j Y') ?>
        <br>
    <?php } ?>
</p>

<?php include 'includes/footer.php'; ?>
