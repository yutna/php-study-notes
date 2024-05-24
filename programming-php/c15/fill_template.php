<?php

function fill_template($name, $values = array())
{
    $template_file = __DIR__ . DIRECTORY_SEPARATOR . $name;

    if ($file = fopen($template_file, 'r')) {
        $template = fread($file, filesize($template_file));
        fclose($file);
    }

    $keys = array_keys($values);

    foreach ($keys as $key) {
        $template = str_replace("{{$key}}", $values[$key], $template);
    }

    return $template;
}
