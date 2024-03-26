<?php

declare(strict_types=1);

require '../includes/database-connection.php';
require '../includes/functions.php';

$success = $_GET['success'] ?? null;
$failure = $_GET['failure'] ?? null;

$sql = "SELECT id, name, navigation FROM category;";
$categories = pdo($pdo, $sql)->fetchAll();
?>

<?php include '../includes/admin-header.php'; ?>

<main class="container" id="content">
    <section class="header">
        <h1>Categories</h1>

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
            <a href="category.php" class="btn btn-primary">
                Add new category
            </a>
        </p>
    </section>

    <table class="categories">
        <thead>
            <tr>
                <th>Name</th>
                <th class="edit">Edit</th>
                <th class="del">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td>
                        <strong><?= html_escape($category['name']) ?></strong>
                    </td>
                    <td>
                        <a href="category.php?id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="category-delete.php?id=<?= $category['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php include '../includes/admin-footer.php'; ?>
