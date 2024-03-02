<?php
$color = $_COOKIE['color'] ?? null;
$options = ['light', 'dark'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color = $_POST['color'];
    setcookie('color', $color, strtotime('+1 hour'), '/', '', false, true);
}

$scheme = (in_array($color, $options)) ? $color : 'dark';
?>

<?php include 'includes/header-style-switcher.php'; ?>

<form action="cookie-preferences.php" method="POST">
    <div>
        <label for="color">Select color scheme:</label>
        <select name="color" id="color">
            <?php foreach ($options as $option) { ?>
                <option value="<?= $option ?>" <?= $option === htmlspecialchars($scheme) ? 'selected' : '' ?>>
                    <?= ucfirst($option) ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>
