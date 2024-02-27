<?php include 'includes/header.php'; ?>
<?php $form = filter_input_array(INPUT_POST); ?>

<form action="filter-input-array.php" method="POST">
    <label>
        Email:
        <input type="text" name="email" value="<?= htmlspecialchars($form['email']) ?>">
    </label>
    <br>
    <label>
        I agree to terms and conditions:
        <input type="checkbox" name="terms" value="true">
    </label>
    <br>
    <input type="submit" value="Save">
</form>
<pre><?php var_dump($form); ?></pre>

<?php include 'includes/footer.php'; ?>
