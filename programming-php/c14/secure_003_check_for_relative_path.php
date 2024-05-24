<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = $_POST['username'];
    $vetted = basename(realpath($filename));

    if ($filename !== $vetted) {
        die("{$filename} is NOT a good username");
    } else {
        // If the filename match the original
        // It's safe to use statement like this
        // include("/usr/local/lib/greetings/{$filename}");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check for relative path</title>
    <style>
        body {
            color: white;
            background-color: black;
        }
    </style>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
