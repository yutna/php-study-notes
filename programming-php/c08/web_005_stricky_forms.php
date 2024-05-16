<?php
// Many websites use a technique known as `stricky froms`, in which the results
// of a query are accompanied by a search form whose default values are those
// of the previous query.

$fahrenheit = $_GET['fahrenheit'] ?? null;

if (!is_null($fahrenheit)) {
    $celsius = ($fahrenheit - 32) * 5 / 9;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Conversion (Stricky Form Version)</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
        Fahrenheit temperature:
        <input type="text" name="fahrenheit" value="<?= $fahrenheit ?>" />
        <input type="submit" value="Convert to Celsius!" />
    </form>

    <?php if (isset($celsius)) : ?>
        <?php printf("%.2fF is %.2fC", $fahrenheit, $celsius); ?>
    <?php endif; ?>
</body>

</html>
