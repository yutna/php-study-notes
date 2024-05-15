<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Conversion</title>
</head>

<body>
    <!-- One PHP page can be used to both generate a form and subsequently process it. -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') : ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            Fahrenheit temperature:
            <input type="text" name="fahrenheit" /><br />
            <input type="submit" value="Convert to Celsius!" />
        </form>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <?php $fahrenheit = $_POST['fahrenheit']; ?>
        <?php $celsius = ($fahrenheit - 32) * 5 / 9; ?>
        <?php printf("%.2fF is %.2fC", $fahrenheit, $celsius); ?>
    <?php else : ?>
        <?php die("This script only works with GET and POST requests."); ?>
    <?php endif; ?>
</body>

</html>
