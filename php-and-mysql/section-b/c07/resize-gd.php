<?php

declare(strict_types=1);

$allowed_exts = ['gif', 'jpeg', 'jpg', 'png'];
$allowed_types = ['image/gif', 'image/jpeg', 'image/png'];
$error = '';
$max_size = 5242880;
$message = '';
$moved = false;
$resized = false;
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

function resize_image_gd(string $orig_path, string $new_path, int $max_width, int $max_height): bool
{
    $image_data = getimagesize($orig_path);
    $orig_width = $image_data[0];
    $orig_height = $image_data[1];
    $media_type = $image_data['mime'];
    $new_width = $max_width;
    $new_height = $max_height;
    $orig_ratio = $orig_width / $orig_height;
    $orig = false;
    $result = false;

    if ($orig_width > $orig_height) {
        $new_height = intval($new_width / $orig_ratio);
    } else {
        $new_width = intval($new_height * $orig_ratio);
    }

    switch ($media_type) {
        case 'image/gif':
            $orig = imagecreatefromgif($orig_path);
            break;
        case 'image/jpeg':
            $orig = imagecreatefromjpeg($orig_path);
            break;
        case 'image/png':
            $orig = imagecreatefrompng($orig_path);
            break;
    }

    $new = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);

    switch ($media_type) {
        case 'image/gif':
            $result = imagegif($new, $new_path);
            break;
        case 'image/jpeg':
            $result = imagejpeg($new, $new_path);
            break;
        case 'image/png':
            $result = imagepng($new, $new_path);
            break;
    }

    return $result;
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
            $resized = resize_image_gd($destination, $thumbpath, 200, 200);
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

<?php if ($thumbpath) { ?>
    <div>
        <img src="<?= $thumbpath ?>" alt="Resized path">
    </div>
<?php } ?>

<form action="resize-gd.php" enctype="multipart/form-data" method="post">
    <label for="image">
        <b>Upload file:</b>
    </label>
    <input type="file" name="image" id="image" accept="image/*">
    <br>
    <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php'; ?>
