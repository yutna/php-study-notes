<?php

$image = imagecreate(200, 200);

$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($image, 0x00, 0x00, 0x00);

imagefilledrectangle($image, 50, 50, 150, 150, $black);

// imagetypes() จะ return bit field ให้เราใช้ bitwise AND (&) ในการเช็คแบบตัวอย่างข้างล่าง

if (imagetypes() & IMG_PNG) {
    header('Content-Type: image/png');
    imagepng($image);
} else if (imagetypes() & IMG_JPG) {
    header('Content-Type: image/jpeg');
    imagejpeg($image);
} else if (imagetypes() & IMG_GIF) {
    header('Content-Type: image/gif');
    imagegif($image);
}
