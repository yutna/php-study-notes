<?php

$image = imagecreate(70, 350);

$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

$font_name = __DIR__ . DIRECTORY_SEPARATOR . "KumphaBold.ttf";
$text = "The Quick Brown Fox";

imagettftext($image, 20, 270, 28, 10, $black, $font_name, $text);

header('Content-Type: image/png');
imagepng($image);
