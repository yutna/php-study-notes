<?php include 'includes/header.php'; ?>

<?php
$number = '';

$settings['flags'] = FILTER_FLAG_ALLOW_HEX;
$settings['options']['min_range'] = 0;
$settings['options']['max_range'] = 255;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT, $settings);
}
?>

<form action="validate-input.php" method="POST">
    <div>
        <label for="number">Number:</label>
        <input type="text" name="number" id="number" value="<?= htmlspecialchars($number) ?>">
    </div>
    <button type="submit">Save</button>
</form>
<pre><?php var_dump($number); ?></pre>

<?php include 'includes/footer.php'; ?>
