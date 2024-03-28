<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$article = [];
$errors = [
    'warning' => '',
    'alt' => '',
];

if (!$id) {
    redirect('articles.php', ['failure' => 'Article not found']);
}

$article = $cms->getArticle()->get($id, false);

if (!$article['image_file']) {
    redirect('article.php', ['id' => $id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article['image_alt'] = $_POST['image_alt'];
    $errors['alt'] = Validate::isText($article['image_alt'], 1, 254) ? '' : 'Alt text for image should be 1-254 characters.';

    if ($errors['alt']) {
        $errors['warning'] = 'Please correct error below';
    } else {
        $cms->getArticle()->altUpdate($article['image_id'], $article['image_alt']);
        redirect('article.php', ['id' => $id]);
    }
}
?>

<?php include APP_ROOT . '/public/includes/admin-header.php'; ?>

<main class="container admin" id="content">
    <form action="alt-text-edit.php?id=<?= $id ?>" method="POST" class="narrow">
        <h1>Update ALT Text</h1>

        <?php if ($errors['warning']) { ?>
            <div class="alert alert-danger">
                <?= $errors['warning'] ?>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="image_alt">Alt text: </label>
            <input type="text" class="form-control" name="image_alt" id="image_alt" value="<?= html_escape($article['image_alt']) ?>">
            <div class="errors"><?= $errors['alt'] ?></div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-save" name="delete" value="Confirm">
        </div>

        <img src="../uploads/<?= $article['image_file'] ?>" alt="<?= html_escape($article['image_alt']) ?>">
    </form>
</main>

<?php include APP_ROOT . '/public/includes/admin-footer.php'; ?>
