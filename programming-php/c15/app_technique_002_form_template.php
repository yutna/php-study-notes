<?php

require('fill_template.php');

$bindings['DESTINATION'] = $_SERVER['PHP_SELF'];
$name = $_GET['name'] ?? '';

if (!empty($name)) {
    $template = 'thankyou.template.html';
    $bindings['NAME'] = $name;
} else {
    $template = 'user.template.html';
}

echo fill_template($template, $bindings);
