<?php $home_url = PHP_OS === 'Darwin' ? 'http://php-playground.test' : 'http://localhost/php-playground'; ?>
<?php require_once 'includes/header.php'; ?>

<h1>Sorry, We cannot find that page.</h1>
<p>
    Try the <a href="<?= $home_url ?>">home page</a> or email us at
    <a href="mailto:hello@eg.link">hello@eg.link</a>.
</p>

<?php require_once 'includes/footer.php'; ?>
