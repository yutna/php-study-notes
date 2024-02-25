<?php

declare(strict_types=1);

$message = $_GET['msg'] ?? 'Click the link above';
?>

<?php include 'includes/functions.php'; ?>

<a class="badlink" href="xss-2.php?msg=<script src='js/bad.js'></script>">
    ESCAPING MARKUP
</a>

<?php include 'includes/header.php'; ?>

<h1>XSS Example</h1>
<h2><?= html_escape($message) ?></h2>

<?php include 'includes/footer.php'; ?>
