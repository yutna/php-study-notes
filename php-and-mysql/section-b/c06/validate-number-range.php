<?php

declare(strict_types=1);

$age = '';
$message = '';

include 'includes/validate.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'];
    $valid = is_number($age, 16, 65);

    if ($valid) {
        $message = 'Age is valid';
    } else {
        $message = 'You must be 16-65';
    }
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>

<form action="validate-number-range.php" method="POST">
    Age: <input type="text" name="age" value="<?= htmlspecialchars($age) ?>">
    <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
