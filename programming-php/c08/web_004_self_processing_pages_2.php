<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Conversion</title>
</head>

<body>
    <?php if (isset($_GET['fahrenheit'])) : ?>
        <?php $fahrenheit = $_GET['fahrenheit']; ?>
    <?php else : ?>
        <?php $fahrenheit = null; ?>
    <?php endif; ?>

    <?php if (is_null($fahrenheit)) : ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
            Fahrenheit temperature:
            <input type="text" name="fahrenheit" /><br />
            <input type="submit" value="Convert to Celsius!" />
        </form>
    <?php else : ?>
        <?php $celcius = ($fahrenheit - 32) * 5 / 9; ?>
        <?php printf("%.2fF is %.2fC", $fahrenheit, $celcius); ?>
    <?php endif; ?>
</body>

</html>
