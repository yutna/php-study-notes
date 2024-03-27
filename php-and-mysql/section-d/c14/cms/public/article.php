<?php

declare(strict_types=1);

require '../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    include APP_ROOT . '/public/page-not-found.php';
}

$article = $cms->getArticle()->get($id);

if (!$article) {
    include APP_ROOT . '/public/page-not-found.php';
}

$navigation = $cms->getCategory()->getAll();

$section = $article['category_id'];
$title = $article['title'];
$description = $article['summary'];
?>

<?php include APP_ROOT . '/public/includes/header.php'; ?>

<main class="article container">
    <section class="image">
        <img alt="<?= html_escape($article['image_alt']) ?>" src="uploads/<?= html_escape($article['image_file'] ?? 'blank.png') ?>">
    </section>
    <section class="text">
        <h1><?= html_escape($article['title']) ?></h1>
        <div class="date"><?= format_date($article['created']) ?></div>
        <div class="content"><?= html_escape($article['content']) ?></div>
        <p class="credit">
            Posted in
            <a href="category.php?id=<?= $article['category_id'] ?>">
                <?= html_escape($article['category']) ?>
            </a>
            by
            <a href="member.php?id=<?= $article['member_id'] ?>">
                <?= html_escape($article['author']) ?>
            </a>
        </p>
    </section>
</main>

<?php include APP_ROOT . '/public/includes/footer.php'; ?>
