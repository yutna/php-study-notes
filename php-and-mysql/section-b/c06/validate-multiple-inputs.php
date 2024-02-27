<?php include 'includes/header.php'; ?>

<?php
$form['email'] = '';
$form['age'] = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filters['email'] = FILTER_VALIDATE_EMAIL;
    $filters['age']['filter'] = FILTER_VALIDATE_INT;
    $filters['age']['options']['min_range'] = 16;
    $form = filter_input_array(INPUT_POST, $filters);
}
?>

<form action="validate-multiple-inputs.php" method="POST">
    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?= htmlspecialchars($form['email']) ?>">
    </div>
    <div>
        <label for="age">Age:</label>
        <input type="text" name="age" id="age" value="<?= htmlspecialchars($form['age']) ?>">
    </div>
    <div>
        <label for="terms">I agree to the terms and conditions:</label>
        <input type="checkbox" name="terms" id="terms" value="1">
    </div>
    <button type="submit">Save</button>
</form>
<pre><?php var_dump($form); ?></pre>

<?php include 'includes/footer.php'; ?>
