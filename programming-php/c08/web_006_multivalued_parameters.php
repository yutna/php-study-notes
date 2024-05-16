<?php
// To ensure that PHP recognizes the multiple values that the browser passes to
// form-processing script, you need to use square brackets, [], after the name
// of the field in the HTML form. e.g. <select name="languages[]">...</select>

// Now, when the user submits the form, $_GET['languages'] contains an array
// instead of a simple string. This array contains the values were selected by
// user.

$options = array(
    'perky',
    'morose',
    'thinking',
    'feeling',
    'thrifty',
    'shopper',
);

if (array_key_exists('s', $_GET)) {
    $description = join(' ', $_GET['attributes']);
    $message = sprintf("You have a %s personality.", $description);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multivalued Parameters</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
        Select your personality attributes:<br />
        <select name="attributes[]" multiple>
            <?php foreach ($options as $option) : ?>
                <option value="<?= $option ?>">
                    <?= ucfirst($option) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <input type="submit" name="s" value="Record my personality!" />
    </form>

    <?php if (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>

</html>
