<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirect('articles.php', ['failure' => 'Article not found']);
}

$article = $cms->getArticle()->get($id, false);

if (!$article['image_file']) {
    redirect('article.php', ['id' => $id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = UPLOADS . $article['image_file'];
    $cms->getArticle()->imageDelete($article['image_id'], $path, $id);
    redirect('article.php', ['id' => $id]);
}
?>

<?php include APP_ROOT . '/public/includes/admin-header.php'; ?>

<main class="container admin" id="content">
    <form action="image-delete.php?id=<?= $id ?>" method="POST" class="narrow">
        <h1>Delete Image</h1>
        <p>
            <img src="../uploads/<?= html_escape($article['image_file']) ?>" alt="<?= html_escape($article['image_alt']) ?>">
        </p>
        <p>Click confirm to delete the image:</p>
        <input type="submit" class="btn btn-primary" name="delete" value="Confirm">
        <a href="article.php?id=<?= $id ?>" class="btn btn-danger">Cancel</a>
    </form>
</main>

<?php include APP_ROOT . '/public/includes/admin-footer.php'; ?>
