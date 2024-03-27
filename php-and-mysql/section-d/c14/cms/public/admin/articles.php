<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$success = $_GET['success'] ?? null;
$failure = $_GET['failure'] ?? null;

$articles = $cms->getArticle()->getAll(false);
?>

<?php include APP_ROOT . '/public/includes/admin-header.php'; ?>

<main class="container" id="content">
    <section class="header">
        <h1>Articles</h1>

        <?php if ($success) { ?>
            <div class="alert alert-success">
                <?= $success ?>
            </div>
        <?php } ?>

        <?php if ($failure) { ?>
            <div class="alert alert-danger">
                <?= $failure ?>
            </div>
        <?php } ?>

        <p>
            <a href="article.php" class="btn btn-primary">
                Add new article
            </a>
        </p>
    </section>

    <table class="articles">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th class="created">Created</th>
                <th class="pub">Published</th>
                <th class="edit">Edit</th>
                <th class="del">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) { ?>
                <tr>
                    <td>
                        <img src="../uploads/<?= html_escape($article['image_file'] ?? 'blank.png') ?>" alt="<?= html_escape($article['image_alt']) ?>">
                    </td>
                    <td>
                        <strong><?= html_escape($article['title']) ?></strong>
                    </td>
                    <td><?= format_date($article['created']) ?></td>
                    <td><?= $article['published'] === 1 ? 'Yes' : 'No' ?></td>
                    <td>
                        <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="article-delete.php?id=<?= $article['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php include APP_ROOT . '/public/includes/admin-footer.php'; ?>
