<?php
$start = strtotime('January 1 2021');
// $end = mktime(0, 0, 0, 2, 1, 2021);
$end = strtotime('next week');

$start_date = date('D jS F Y', $start);
$end_date = date('D jS F Y', $end);
?>

<?php include 'includes/header.php'; ?>

<p><b>Start Date:</b> <?= $start_date ?></p>
<p><b>End Date:</b> <?= $end_date ?></p>

<?php include 'includes/footer.php'; ?>
