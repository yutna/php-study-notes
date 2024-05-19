<?php

$source = imagecreatefrompng('image1.png');

$width = imagesx($source);
$height = imagesy($source);

$x = intval($width / 4);
$y = intval($height / 4);

$destination = imagecreatetruecolor($x, $y);
imagecopyresized($destination, $source, 0, 0, 0, 0, $x, $y, $width, $height);

header('Content-Type: image/png');
imagepng($destination);
