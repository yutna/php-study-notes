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

// Load ENV variables
$dotenv = \Dotenv\Dotenv::createImmutable(APP_ROOT);
$dotenv->load();

// Set ENV variables
define('TINY_MCE_API_KEY', $_ENV['TINY_MCE_API_KEY']);

// Initialize cms instance
$cms = new \PhpBook\CMS\CMS($dsn, $username, $password);
unset($dsn, $username, $password);

// Set Twig template engine
$twig_options['cache'] = APP_ROOT . '/tmp/cache';
$twig_options['debug'] = DEV;

$twig_loader = new \Twig\Loader\FilesystemLoader(APP_ROOT . '/templates');
$twig = new \Twig\Environment($twig_loader, $twig_options);

$twig->addGlobal('doc_root', DOC_ROOT);
$twig->addGlobal('tinyMCE_api_key', TINY_MCE_API_KEY);

if (DEV) {
    $twig->addExtension(new \Twig\Extension\DebugExtension());
}
