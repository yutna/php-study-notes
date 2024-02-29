<?php

declare(strict_types=1);

$allowed_exts = ['gif', 'jpeg', 'jpg', 'png'];
$allowed_types = ['image/gif', 'image/jpeg', 'image/png'];
$error = '';
$max_size = 5242880;
$message = '';
$moved = false;
$thumb = false;
$thumbpath = '';
$upload_path = 'uploads/';

function create_filename(string $filename, string $upload_path): string
{
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = preg_replace('/[^A-z0-9]/', '-', $basename);
    $filename = $basename . '.' . $extension;
    $i = 0;

    while (file_exists($upload_path . $filename)) {
        $i += 1;
        $filename = $basename . $i . '.' . $extension;
    }

    return $filename;
}

function create_cropped_thumbnail(string $temporary, string $destination): bool
{
    $image = new Imagick($temporary);
    $image->cropThumbnailImage(200, 200, true);
    $image->writeImage($destination);

    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['image']['error'] === 0) {
        $error .= ($_FILES['image']['size'] <= $max_size) ? '' : 'too big ';

        $type = mime_content_type($_FILES['image']['tmp_name']);
        $error .= in_array($type, $allowed_types) ? '' : 'wrong type ';

        $ext = mb_strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowed_exts) ? '' : 'wrong file extension ';

        if (!$error) {
            $filename = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $moved = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $thumbpath = $upload_path . 'thumb_' . $filename;
            $thumb = create_cropped_thumbnail($destination, $thumbpath);
        }
    }

    if ($_FILES['image']['error'] === 1) {
        $error = 'too big';
    }

    if ($moved) {
        $message = 'Uploaded:<br><img alt="Uploaded file" src="' . $destination . '">';
    } else {
        $message = '<b>Could not upload file:</b> ' . $error;
    }
}
?>

<?php include 'includes/header.php'; ?>

<?= $message ?>

<?php if ($thumb) { ?>
    <div>
        <img src="<?= $thumbpath ?>" alt="Resized path">
    </div>
<?php } ?>

<form action="crop-im.php" enctype="multipart/form-data" method="post">
    <label for="image">
        <b>Upload file:</b>
    </label>
    <input type="file" name="image" id="image" accept="image/*">
    <br>
    <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php'; ?>
