<?php

$image = imagecreatetruecolor(256, 60);

for ($x = 0; $x < 256; $x++) {
    imageline($image, $x, 0, $x, 19, $x);
    imageline($image, 255 - $x, 20, 255 - $x, 39, $x << 8);
    imageline($image, $x, 40, $x, 59, $x << 16);
}

header('Content-Type: image/png');
imagepng($image);
