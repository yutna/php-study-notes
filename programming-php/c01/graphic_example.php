<?php
if (isset($_GET['message'])) {
    $font = dirname(__FILE__) . '/Ubuntu-Regular.ttf';
    $size = 120;
    $image = imagecreatefrompng("button.png");
    $tsize = imagettfbbox($size, 0, $font, $_GET['message']);

    $dx = abs($tsize[2] - $tsize[0]);
    $dy = abs($tsize[5] - $tsize[3]);
    $x = (imagesx($image) - $dx) / 2;
    $y = (imagesy($image) - $dy) / 2 + $dy;

    $black = imagecolorallocate($image, 0, 0, 0);
    imagettftext($image, $size, 0, $x, $y, $black, $font, $_GET['message']);

    header('Content-type: image/png');
    imagepng($image);

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic Example</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <label for="message">Enter message to appear on button:</label>
        <br /><br />
        <input type="text" name="message" id="message" />
        <br /><br />
        <button type="submit">Create button</button>
    </form>
</body>

</html>
