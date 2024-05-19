<?php

$image = imagecreate(350, 70);

$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($image, 0x00, 0x00, 0x00);

$font_name = __DIR__ . DIRECTORY_SEPARATOR . 'KumphaBold.ttf';

imagettftext($image, 20, 0, 10, 40, $black, $font_name, "The Quick Brown Fox");

header('Content-Type: image/png');
imagepng($image);
