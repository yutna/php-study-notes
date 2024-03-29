<?php

// Application root setting
define('APP_ROOT', dirname(__DIR__));

// Required files
require APP_ROOT . '/config/config.php';
require APP_ROOT . '/src/functions.php';
require APP_ROOT . '/vendor/autoload.php';

// Set default error handling for the production environment
if (DEV === false) {
    set_error_handler('handle_error');
    set_exception_handler('handle_exception');
    register_shutdown_function('handle_shutdown');
}

// Initialize cms instance
$cms = new \PhpBook\CMS\CMS($dsn, $username, $password);
unset($dsn, $username, $password);
