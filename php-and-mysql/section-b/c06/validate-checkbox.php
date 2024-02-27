<?php
$terms = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $terms = isset($_POST['terms']) && ($_POST['terms'] === 'true');
    $message = $terms ? 'Thank you' : 'You must agree to the terms and conditions';
}
?>

<?php include 'includes/header.php'; ?>
<?= $message ?>

<form action="validate-checkbox.php" method="POST">
    <label>
        I agree to the terms and conditions:
        <input type="checkbox" name="terms" value="true" <?= $terms ? 'checked' : '' ?>
    </label>
    <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
