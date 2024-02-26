<?php

declare(strict_types=1);

$password = '';
$message = '';

include 'includes/validate.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $valid = is_password($password);
    $message = $valid ? 'Password is valid' : 'Password NOT strong enough';
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>

<form action="validate-password.php" method="POST">
    Password: <input type="password" name="password">
    <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
