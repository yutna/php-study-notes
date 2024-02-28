<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['image']['error'] === 0) {
        $message .= '<b>File:</b>' . $_FILES['image']['name'] . '<br>';
        $message .= '<b>Size:</b>' . $_FILES['image']['size'] . ' bytes';
    } else {
        $message = 'The file could not be uploaded.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>
<form action="upload-file.php" enctype="multipart/form-data" method="post">
    <label for="image">
        <b>Upload file:</b>
    </label>
    <input type="file" name="image" id="image" accept="image/*">
    <br>
    <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php'; ?>
