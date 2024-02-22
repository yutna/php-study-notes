<?php $path = 'images/pattern.png'; ?>
<?php include 'includes/header.php'; ?>

<?php if (file_exists($path)) { ?>
    <strong>Name:</strong>
    <?= pathinfo($path, PATHINFO_BASENAME) ?>
    <br>

    <strong>Size:</strong>
    <?= number_format(filesize($path)) ?> bytes
    <br>

    <strong>Mime type:</strong>
    <?= mime_content_type($path) ?>
    <br>

    <strong>Folder:</strong>
    <?= pathinfo($path, PATHINFO_DIRNAME) ?>
    <br>
<?php } else { ?>
    <p>There is no such file.</p>
<?php } ?>

<?php include 'includes/footer.php'; ?>
