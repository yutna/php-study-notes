<?php

// There are a few best practices for the filtering process:
// 1) Use a whitelist approach. This means you err on the side of caution and
// assume data is invalid unless you can prove it to be valid.
// 2) Never correct invalid data. History has proven that attempts to correct
// invalid data often result in security vulnerabilities due to errors.
// 3) Use a naming convention to help distinguish between filtered and tainted
// data. Filtering is useless if you can NOT reliably determine whether
// something has been filtered.

$colors = ['red', 'green', 'blue'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clean = array();

    switch ($_POST['color']) {
        case 'red':
        case 'green':
        case 'blue':
            $clean['color'] = $_POST['color'];
            break;
        default:
            // ERROR
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtering Input</title>
    <style>
        body {
            color: white;
            background-color: black;
        }
    </style>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <p>Please select a color:</p>
        <select name="color">
            <?php foreach ($colors as $color) : ?>
                <option value="<?= $color ?>">
                    <?= ucfirst($color) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" />
    </form>
</body>

</html>
