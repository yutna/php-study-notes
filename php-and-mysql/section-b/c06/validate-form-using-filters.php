<?php
$user = ['name' => '', 'age' => '', 'terms' => ''];
$errors = ['name' => '', 'age' => '', 'terms' => false];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validate_filters['name']['filter'] = FILTER_VALIDATE_REGEXP;
    $validate_filters['name']['options']['regexp'] = '/^[A-z]{2,10}$/';
    $validate_filters['age']['filter'] = FILTER_VALIDATE_INT;
    $validate_filters['age']['options']['min_range'] = 16;
    $validate_filters['age']['options']['max_range'] = 65;
    $validate_filters['terms'] = FILTER_VALIDATE_BOOLEAN;

    $user = filter_input_array(INPUT_POST, $validate_filters);

    $errors['name'] = $user['name'] ? '' : 'Name must be 2-10 letters using A-z';
    $errors['age'] = $user['age'] ? '' : 'You must be 16-65';
    $errors['terms'] = $user['terms'] ? '' : 'You must agree to the terms & conditions';

    $invalid = implode($errors);

    if ($invalid) {
        $messsage = 'Please correct the following errors';
    } else {
        $message = 'Thank you, your data was valid';
    }

    $user['name'] = filter_var($user['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user['age'] = filter_var($user['age'], FILTER_SANITIZE_NUMBER_INT);
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>
<form action="validate-form-using-filters.php" method="POST">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $user['name'] ?>">
        <span class="error"><?= $errors['name'] ?></span>
    </div>
    <div>
        <label for="age">Age:</label>
        <input type="text" name="age" id="age" value="<?= $user['age'] ?>">
        <span class="error"><?= $errors['age'] ?></span>
    </div>
    <div>
        <input type="checkbox" name="terms" id="terms" value="true" <?= $user['terms'] ? 'checked' : '' ?>>
        <label for="terms">I agree to the terms and conditions</label>
        <span class="error"><?= $errors['terms'] ?></span>
    </div>
    <button type="submit">Save</button>
</form>

<?php include 'includes/footer.php'; ?>
