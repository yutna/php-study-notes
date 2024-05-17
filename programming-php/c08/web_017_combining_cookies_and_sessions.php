<?php
// Any state that should be forgotten when a user leaves the site, such as
// which page the user is on, can be left up to PHP's built-in sessions.

// Any state that should persist between user visits, such as a unique user ID,
// can be stored in a cookie.

$colors = array('gray', 'white', 'black', 'blue', 'green', 'red');

if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_POST['bgcolor']) {
    setcookie('bgcolor', $_POST['bgcolor'], time() + (60 * 60 * 24 * 7));
}

if (isset($_COOKIE['bgcolor'])) {
    $background_name = $_COOKIE['bgcolor'];
} elseif (isset($_POST['bgcolor'])) {
    $background_name = $_POST['bgcolor'];
} else {
    $background_name = 'gray';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combining Cookies and Sessions</title>
</head>

<body style="background-color: <?= $background_name ?>;">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div>
            <label for="bgcolor">Background color: </label>
            <select name="bgcolor" id="bgcolor">
                <?php foreach ($colors as $color) : ?>
                    <option value="<?= $color ?>">
                        <?= ucfirst($color) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
