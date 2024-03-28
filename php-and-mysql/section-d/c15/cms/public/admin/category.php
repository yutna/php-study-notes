<?php

declare(strict_types=1);

use PhpBook\Validate\Validate;

require '../../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$saved = false;

$category = [
    'id' => $id,
    'name' => '',
    'description' => '',
    'navigation' => false,
];

$errors = [
    'warning' => '',
    'name' => '',
    'description' => '',
];

// If there was an id, page is editing the category, so get current category
if ($id) {
    $category = $cms->getCategory()->get($id);

    if (!$category) {
        redirect('categories.php', ['failure' => 'Category not found']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category['name'] = $_POST['name'];
    $category['description'] = $_POST['description'];
    $category['navigation'] = isset($_POST['navigation']) && ($_POST['navigation'] == 1) ? 1 : 0;

    $errors['name'] = Validate::isText($category['name'], 1, 24) ? '' : 'Name should be 1-24 characters.';
    $errors['description'] = Validate::isText($category['description'], 1, 254) ? '' : 'Description should be 1-254 characters.';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['warning'] = 'Please correct errors';
    } else {
        $arguments = $category;

        if ($id) {
            $saved = $cms->getCategory()->update($arguments);
        } else {
            unset($arguments['id']);
            $saved = $cms->getCategory()->create($arguments);
        }

        if ($saved) {
            redirect('categories.php', ['success' => 'Category saved']);
        } else {
            $errors['warning'] = 'Category name already in use';
        }
    }
}
?>

<?php include APP_ROOT . '/public/includes/admin-header.php'; ?>

<main class="container admin" id="content">
    <form action="category.php?id=<?= $id ?>" class="narrow" method="POST">
        <h2>Edit Category</h2>

        <?php if ($errors['warning']) { ?>
            <div class="alert alert-danger">
                <?= $errors['warning'] ?>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="<?= html_escape($category['name']) ?>" class="form-control">
            <span class="errors"><?= $errors['name'] ?></span>
        </div>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control"><?= html_escape($category['description']) ?></textarea>
            <span class="errors"><?= $errors['description'] ?></span>
        </div>

        <div class="form-check">
            <input type="checkbox" name="navigation" id="navigation" value="1" class="form-check-input" <?= $category['navigation'] === 1 ? 'checked' : '' ?>>
            <label for="navigation" class="form-check-label">Navigation</label>
        </div>

        <input type="submit" class="btn btn-primary btn-save" value="save">
    </form>
</main>

<?php include APP_ROOT . '/public/includes/admin-footer.php'; ?>
