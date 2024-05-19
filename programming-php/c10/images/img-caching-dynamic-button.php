<?php

$tmp_path = __DIR__ . DIRECTORY_SEPARATOR . 'tmp';

if ($bytes = filesize($tmp_path . DIRECTORY_SEPARATOR . 'button.png')) {
    header('Content-Type: text/png');
    header('Content-Length: ' . $bytes);
    readfile($tmp_path . DIRECTORY_SEPARATOR . 'button.png');
    exit;
}

$font = __DIR__ . DIRECTORY_SEPARATOR . 'KumphaBold.ttf';
$button = __DIR__ . DIRECTORY_SEPARATOR . 'button.png';

$size = isset($_GET['size']) ? $_GET['size'] : 12;
$text = isset($_GET['text']) ? $_GET['text'] : 'some text';

$image = imagecreatefrompng($button);
$black = imagecolorallocate($image, 0, 0, 0);

if ($text) {
    $tsize = imagettfbbox($size, 0, $font, $text);
    $dx = abs($tsize[2] - $tsize[0]);
    $dy = abs($tsize[5] - $tsize[3]);
    $x = intval((imagesx($image) - $dx) / 2);
    $y = intval(((imagesy($image) - $dy) / 2)) + $dy;

    imagettftext($image, $size, 0, $x, $y, $black, $font, $text);
    imagepng($image, $tmp_path . DIRECTORY_SEPARATOR . 'button.png');
}

header('Content-Type: image/png');
imagepng($image);
