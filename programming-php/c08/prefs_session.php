<?php
session_start();

$colors = array(
    'black' => '#000000',
    'white' => '#ffffff',
    'red' => '#ff0000',
    'blue' => '#0000ff',
);

$bg = '';
$fg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bg = $colors[$_POST['background']];
    $fg = $colors[$_POST['foreground']];

    $_SESSION['bg'] = $bg;
    $_SESSION['fg'] = $fg;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions - Preferences Set</title>
</head>

<body>
    <p>
        Thank you. Your preferences have been changed to: <br />
        Background: <?= $_POST['background'] ?> <br />
        Foreground: <?= $_POST['foreground'] ?>
    </p>

    <p>
        Click
        <a href="prefs_session_demo.php">here</a>
        to see the preferences in action.
    </p>
</body>

</html>
