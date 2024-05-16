<?php
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
        Select your personality attributes:<br /><br />
        <?php foreach ($options as $option) : ?>
            <label>
                <input type="checkbox" name="attributes[]" value="<?= $option ?>" />
                <?= ucfirst($option) ?>
            </label>
        <?php endforeach; ?>
        <br /><br />
        <input type="submit" name="s" value="Record my personality!" />
    </form>

    <?php if (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>

</html>
