<?php
declare(strict_types=1);
require 'includes/validate.php';

$user = [
    'name' => '',
    'age' => '',
    'terms' => '',
];

$errors = [
    'name' => '',
    'age' => '',
    'terms' => '',
];

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user['name'] = $_POST['name'];
    $user['age'] = $_POST['age'];
    $user['terms'] = isset($_POST['terms']) && ($_POST['terms'] === 'true');
    
    $errors['name'] = is_text($user['name'], 2, 20) ? '' : 'Must be 2-20 characters';
    $errors['age'] = is_number($user['age'], 16, 65) ? '' : 'You must be 16-65';
    $errors['terms'] = $user['terms'] ? '' : 'You must agree to the terms and conditions';
    
    $invalid = implode($errors);
    
    if ($invalid) {
        $message = 'Please correct the following errors:';
    } else {
        $message = 'Your data was valid';
    }
}
?>

<?php include 'includes/header.php'; ?>
<?= $message ?>

<form action="validate-form.php" method="POST">
    <label>
        Name:
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>">
        <span class="error"><?= $errors['name'] ?></span>
    </label>
    <br>
    <label>
        Age:
        <input type="text" name="age" value="<?= htmlspecialchars($user['age']) ?>">
        <span class="error"><?= $errors['age'] ?></span>
    </label>
    <br>
    <label>
        <input type="checkbox" name="terms" value="true" <?= $user['terms'] ? 'checked' : '' ?>>
        I agree to the terms and conditions
        <span class="error"><?= $errors['terms'] ?></span>
    </label>
    <br>
    <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
