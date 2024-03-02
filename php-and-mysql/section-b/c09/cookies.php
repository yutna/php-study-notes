<?php
$counter = $_COOKIE['counter'] ?? 0;
$counter += 1;
setcookie('counter', $counter);

$my_name = $_COOKIE['my_name'] ?? 'Yutthana';
setcookie('my_name', $my_name);

$message = 'Page View' . $counter;
?>

<?php include 'includes/header.php'; ?>

<h1>Welcome</h1>
<p><?= $message ?></p>
<p><?= $my_name ?></p>
<p>
    <a href="sessions.php">Refresh this page</a> to see the page views increase.
</p>

<?php include 'includes/footer.php'; ?>
