<?php

declare(strict_types=1);

require '../../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$temp = $_FILES['image']['tmp_name'] ?? '';
$destination = '';
$saved = null;

$article = [
    'id' => $id,
    'title' => '',
    'summary' => '',
    'content' => '',
    'published' => false,
    'member_id' => 0,
    'category_id' => 0,
    'image_id' => null,
    'image_file' => '',
    'image_alt' => '',
];

$errors = [
    'warning' => '',
    'title' => '',
    'summary' => '',
    'content' => '',
    'author' => '',
    'category' => '',
    'image_file' => '',
    'image_alt' => '',
];

if ($id) {
    $article = $cms->getArticle()->get($id, false);

    if (!$article) {
        redirect('articles.php', ['failure' => 'Article not found']);
    }
}

$saved_image = $article['image_file'] ? true : false;
$authors = $cms->getMember()->getAll();
$categories = $cms->getCategory()->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $errors['image_file'] = ($temp === '') && ($_FILES['image']['error'] === 1) ? 'File too big ' : '';
    }

    if ($temp && $_FILES['image']['error'] === 0) {
        $article['image_alt'] = $_POST['image_alt'];
        $ext = mb_strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        $errors['image_file'] .= in_array(mime_content_type($temp), MEDIA_TYPES) ? '' : 'Wrong file type. ';
        $errors['image_file'] .= in_array($ext, FILE_EXTENSIONS) ? '' : 'Wrong file extension. ';
        $errors['image_file'] .= $_FILES['image']['size'] <= MAX_SIZES ? '' : 'File too big. ';

        $errors['image_alt'] = Validate::isText($article['image_alt'], 1, 254) ? '' : 'Alt text must be 1-254 characters.';

        if (($errors['image_file'] == '') && ($errors['image_alt'] == '')) {
            $article['image_file'] = create_filename($_FILES['image']['name'], UPLOADS);
            $destination = UPLOADS . $article['image_file'];
        }
    }

    $article['title'] = $_POST['title'];
    $article['summary'] = $_POST['summary'];
    $article['content'] = $_POST['content'];
    $article['member_id'] = $_POST['member_id'];
    $article['category_id'] = $_POST['category_id'];
    $article['published'] = isset($_POST['publised']) && ($_POST['publised'] == 1) ? 1 : 0;

    $errors['title'] = Validate::isText($article['title'], 1, 80) ? '' : 'Title mush be 1-80 characters';
    $errors['summary'] = Validate::isText($article['summary'], 1, 254) ? '' : 'Summary must be 1-254 characters';
    $errors['content'] = Validate::isText($article['content'], 1, 100000) ? '' : 'Article must be 1-100,000 characters';
    $errors['member'] = Validate::isMemberId($article['member_id'], $authors) ? '' : 'Please select an author';
    $errors['category'] = Validate::isCategoryId($article['category_id'], $categories) ? '' : 'Please select a category';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['warning'] = 'Please correct the errors below';
    } else {
        $arguments = $article;

        if ($id) {
            $saved = $cms->getArticle()->update($arguments, $temp, $destination);
        } else {
            unset($arguments['id']);
            $saved = $cms->getArticle()->create($arguments, $temp, $destination);
        }

        if ($saved) {
            redirect('articles.php', ['success' => 'Article saved']);
        } else {
            $errors['warning'] = 'Article title already in use';
        }
    }

    $article['image_file'] = $saved_image ? $article['image_file'] : '';
}
?>

<?php include  APP_ROOT . '/public/includes/admin-header.php'; ?>

<form action="article.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
    <main class="container admin" id="content">
        <h1>Edit Article</h1>

        <?php if ($errors['warning']) { ?>
            <div class="alert alert-danger">
                <?= $errors['warning'] ?>
            </div>
        <?php } ?>

        <div class="admin-article">
            <section class="image">
                <?php if (!$article['image_file']) { ?>
                    <label for="image">Upload image:</label>
                    <div class="form-group image-placeholder">
                        <input type="file" name="image" id="image" class="form-control-file">
                        <br>
                        <span class="errors"><?= $errors['image_file'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="image_alt">Alt text: </label>
                        <input type="text" name="image_alt" id="image_alt" value="" class="form-control">
                        <span class="errors"><?= $errors['image_alt'] ?></span>
                    </div>
                <?php } else { ?>
                    <label>Image:</label>
                    <img src="../uploads/<?= html_escape($article['image_file']) ?>" alt="<?= html_escape($article['image_alt']) ?>">
                    <p class="alt">
                        <strong>Alt text:</strong>
                        <?= html_escape($article['image_alt']) ?>
                    </p>
                    <a href="alt-text-edit.php?id=<?= $article['id'] ?>" class="btn btn-secondary">Edit alt text</a>
                    <a href="image-delete.php?id=<?= $id ?>" class="btn btn-secondary">Delete image</a>
                <?php } ?>
            </section>

            <section class="text">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= html_escape($article['title']) ?>">
                    <span class="errors"><?= $errors['title'] ?></span>
                </div>
                <div class="form-group">
                    <label for="summary">Summary: </label>
                    <textarea name="summary" id="summary" class="form-control"><?= html_escape($article['summary']) ?></textarea>
                    <span class="errors"><?= $errors['summary'] ?></span>
                </div>
                <div class="form-group">
                    <label for="content">Content: </label>
                    <textarea name="content" id="content" class="form-control"><?= html_escape($article['content']) ?></textarea>
                    <span class="errors"><?= $errors['content'] ?></span>
                </div>
                <div class="form-group">
                    <label for="member_id">Author: </label>
                    <select name="member_id" id="member_id">
                        <?php foreach ($authors as $author) { ?>
                            <option value="<?= $author['id'] ?>" <?= $article['member_id'] == $author['id'] ? 'selected' : '' ?>>
                                <?= html_escape($author['forename'] . ' ' . $author['surname']) ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span class="errors"><?= $errors['author'] ?></span>
                </div>
                <div class="form-group">
                    <label for="category">Category: </label>
                    <select name="category_id" id="category">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>" <?= $article['category_id'] == $category['id'] ? 'selected' : '' ?>>
                                <?= html_escape($category['name']) ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span class="errors"><?= $errors['category'] ?></span>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="published" id="published" value="1" <?= $article['published'] == 1 ? 'checked' : '' ?>>
                    <label for="publised" class="form-check-label">Published</label>
                </div>
                <input type="submit" class="btn btn-primary" name="update" value="Save">
            </section>
        </div>
    </main>
</form>

<?php include APP_ROOT . '/public/includes/admin-footer.php'; ?>
