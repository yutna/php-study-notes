<?php $text = 'Home sweet home'; ?>

<?php include 'includes/header.php'; ?>

<p>
    <strong>Lowercase:</strong>
    <?= strtolower($text) ?>
    <br>
    <strong>Uppercase:</strong>
    <?= strtoupper($text) ?>
    <br>
    <strong>Uppercase first letter:</strong>
    <?= ucwords($text) ?>
    <br>
    <strong>Character count:</strong>
    <?= strlen($text) ?>
    <br>
    <strong>Word count:</strong>
    <?= str_word_count($text) ?>
</p>

<?php include 'includes/footer.php'; ?>
