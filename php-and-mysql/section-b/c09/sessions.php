<?php
session_start();

$counter = $_SESSION['counter'] ?? 0;
$my_name = $_SESSION['my_name'] ?? 'Yutthana';

$counter += 1;
$_SESSION['counter'] = $counter;
$_SESSION['my_name'] = $my_name;

$message = 'Page Views: ' . $counter;
?>

<?php include 'includes/header.php'; ?>

<h1>Welcome</h1>
<p><?= $message ?></p>
<p>My name is <?= $my_name ?></p>
<p>
    <a href="sessions.php">Refresh this page</a> to see the page views increase.
</p>

<?php include 'includes/footer.php'; ?>
