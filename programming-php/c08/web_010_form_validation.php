<?php
$name = $_POST['name'] ?? '';
$status = $_POST['status'] ?? '';
$media_type = $_POST['media_type'] ?? '';
$filename = $_POST['filename'] ?? '';
$caption = $_POST['caption'] ?? '';
$tried = $_POST['tried'] ?? '';
$tried = ($tried === 'yes');

$media_type_options = array('picture', 'audio', 'movie');

if ($tried) {
    $validated = (!empty($name) && !empty($media_type) && !empty($filename));

    if (!$validated) {
        $error_message = "The name, media type, and filename are required fields. Please fill them out to continue.";
    } else {
        $message = "The item has been created.";
    }
}

function media_selected($type)
{
    global $media_type;
    return ($media_type === $type) ? 'selected' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>

<body>
    <?php if (isset($error_message)) : ?>
        <p><?= $error_message ?></p>
    <?php elseif (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        Name: <input type="text" name="name" value="<?= $name ?>" /><br />
        Status: <input type="checkbox" name="status" value="active" <?= ($status === 'active') ? 'checked' : '' ?> /> Active <br />
        Media:
        <select name="media_type">
            <option value="">Choose one</option>
            <?php foreach ($media_type_options as $option) : ?>
                <option value="<?= $option ?>" <?= media_selected($option); ?>>
                    <?= ucfirst($option) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />

        File: <input type="text" name="filename" value="<?= $filename ?>" /><br />
        Caption: <textarea name="caption"><?= $caption ?></textarea><br />

        <input type="hidden" name="tried" value="yes" />
        <input type="submit" value="<?= $tried ? 'Continue' : 'Create' ?>" />
    </form>
</body>

</html>
