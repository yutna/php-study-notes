<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Representation of an Image</title>
</head>

<body>
    <?php
    $image = imagecreatefrompng('images/image1.png');
    $dx = imagesx($image);
    $dy = imagesy($image);

    for ($y = 0; $y < $dy; $y++) {
        for ($x = 0; $x < $dx; $x++) {
            $color_index = imagecolorat($image, $x, $y);
            $rgb = imagecolorsforindex($image, $color_index);

            printf('<span style="color: #%02x%02x%02x;">#</span>', $rgb['red'], $rgb['green'], $rgb['blue']);
        }

        echo "<br />";
    }
    ?>
</body>

</html>
