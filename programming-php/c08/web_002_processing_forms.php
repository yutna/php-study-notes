<?php

// Use the $_POST, $_GET, and $_FILES arrays to access form parameters from your
// PHP code. The keys and the parameter names, and the values are the values of
// those parameters. Because periods are legal in HTML field names but NOT in
// PHP variable names, periods in file names are converted to underscore (_)
// in the array.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $word = $_POST['word'];
    $number = $_POST['number'];
    $chunks = ceil(strlen($word) / $number);

    echo "The {$number}-letter chunks of '{$word}' are:<br />";

    for ($i = 0; $i < $chunks; $i++) {
        $chunk = substr($word, $i * $number, $number);
        printf("%d: %s<br />", $i + 1, $chunk);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chunkify Form</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        Enter a word:
        <input type="text" name="word" /><br />
        How long should the chunks be?
        <input type="text" name="number" /><br />
        <input type="submit" value="Chunkify!" />
    </form>
</body>

</html>
