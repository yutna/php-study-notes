<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$deleted = null;
$category = '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    redirect('categories.php', ['failure' => 'Category not found']);
}

$category = $cms->getCategory()->get($id);

if (!$category) {
    redirect('categories.php', ['failure' => 'Category not found']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deleted = $cms->getCategory()->delete($id);

    if ($deleted) {
        redirect('categories.php', ['success' => 'Category deleted']);
    } else {
        redirect('categories.php', ['failure' => 'Category contains articles that must be moved or deleted before you can delete the category']);
    }
}
?>

<?php include APP_ROOT . '/public/includes/admin-header.php'; ?>

<main class="container admin" id="content">
    <form action="category-delete.php?id=<?= $id ?>" class="narrow" method="POST">
        <h1>Delete Category</h1>
        <p>Click confirm to delete the category <em><?= html_escape($category['name']) ?></em></p>
        <input type="submit" name="delete" class="btn btn-primary" value="Confirm">
        <a href="categories.php" class="btn btn-danger">Cancel</a>
    </form>
</main>

<?php include APP_ROOT . '/public/includes/admin-footer.php'; ?>
