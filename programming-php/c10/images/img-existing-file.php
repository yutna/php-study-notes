<?php

$image = imagecreatefrompng('image1.png');

header('Content-Type: text/png');
imagepng($image);
