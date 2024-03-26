<?php

declare(strict_types=1);

require '../../src/bootstrap.php';
require '../includes/database-connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$image = [];

if ($id) {
    $sql = "SELECT i.id, i.file, i.alt
            FROM image AS i
            JOIN article AS a ON i.id = a.image_id
            WHERE a.id = :id;";

    $image = pdo($pdo, $sql, [$id])->fetch();
}

if (!$image) {
    redirect('article.php', ['id' => $id]);
}

$path = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $image['file'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE article
            SET image_id = null
            WHERE id = :id";
    pdo($pdo, $sql, [$id]);

    $sql = "DELETE FROM image
            WHERE id = :id";
    pdo($pdo, $sql, [$image['id']]);

    if (file_exists($path)) {
        unlink($path);
    }

    redirect('article.php', ['id' => $id]);
}
?>

<?php include '../includes/admin-header.php'; ?>

<main class="container admin" id="content">
    <form action="image-delete.php?id=<?= $id ?>" method="POST" class="narrow">
        <h1>Delete Image</h1>
        <p>
            <img src="../uploads/<?= html_escape($image['file']) ?>" alt="<?= html_escape($image['alt']) ?>">
        </p>
        <p>Click confirm to delete the image:</p>
        <input type="submit" class="btn btn-primary" name="delete" value="Confirm">
        <a href="article.php?id=<?= $id ?>" class="btn btn-danger">Cancel</a>
    </form>
</main>

<?php include '../includes/admin-footer.php'; ?>
