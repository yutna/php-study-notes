<?php
function create_logo()
{
    return '<img alt="logo" src="images/logo.png">';
}

function create_copyright_notice()
{
    $year = date('Y');
    $message = '&copy; ' . $year . ' The Candy Store';
    return $message;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions with return values</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1><?= create_logo() ?>The Candy Store</h1>
    </header>
    <article>
        <h2>Welcome to The Candy Store</h2>
    </article>
    <footer>
        <?= create_logo() ?>
        <?= create_copyright_notice() ?>
    </footer>
</body>

</html>
