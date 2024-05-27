<?php

try {
    $result = eval('2 / 0');
} catch (\ParseError $e) {
    echo $e->getMessage();
}
