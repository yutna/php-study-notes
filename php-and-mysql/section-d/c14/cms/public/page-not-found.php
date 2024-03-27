<?php

declare(strict_types=1);

http_response_code(404);

require_once '../src/bootstrap.php';

$navigation = $cms->getCategory()->getAll();

$section = '';
$title = 'Page not found';
$description = '';
?>

<?php require APP_ROOT . '/public/includes/header.php'; ?>

<main class="container" id="content">
    <h1>Sorry! We cannot find that page.</h1>
    <p>
        Try the <a href="index.php">home page</a> or email us
        <a href="mailto:hello@eg.link">hello@eg.link</a>
    </p>
</main>

<?php require APP_ROOT . '/public/includes/footer.php'; ?>
<?php exit; ?>
