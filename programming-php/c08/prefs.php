<?php
$colors = array(
    'black' => '#000000',
    'white' => '#ffffff',
    'red' => '#ff0000',
    'blue' => '#0000ff',
);

$background_name = '';
$foreground_name = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $background_name = $_POST['background'];
    $foreground_name = $_POST['foreground'];

    setcookie('bg', $colors[$background_name]);
    setcookie('fg', $colors[$foreground_name]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies - Preferences Set</title>
</head>

<body>
    <p>
        Thank you. Your preferences have been changed to: <br />
        Background: <?= $background_name ?> <br />
        Foreground: <?= $foreground_name ?> <br />
    </p>

    <p>
        Click
        <a href="prefs_demo.php">here</a>
        to see the preferences in action
    </p>
</body>

</html>
