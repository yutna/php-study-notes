<?php

// Generate a black-filled square.

$image = imagecreate(200, 200);

$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($image, 0x00, 0x00, 0x00);

imagefilledrectangle($image, 50, 50, 150, 150, $black);

header('Content-Type: image/png');
imagepng($image);

// Content-Type values for image formats
// GIF  -> image/gif
// JPEG -> image/jpeg
// PNG  -> image/png
// WBMP -> image/vnd.wap.wbmp
