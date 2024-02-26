<?php

declare(strict_types=1);

$username = '';
$message = '';

include 'includes/validate.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $valid = is_text($username, 3, 18);

    if ($valid) {
        $message = 'Username is valid';
    } else {
        $message = 'Username must be 3-18 characters';
    }
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>

<form action="validate-text-length.php" method="POST">
    Username: <input type="text" name="username" value="<?= htmlspecialchars($username) ?>">
    <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
