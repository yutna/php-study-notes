<?php

$config_folder = mb_substr(__DIR__, mb_strlen($_SERVER['DOCUMENT_ROOT']));
$parent_config_folder = dirname($config_folder);

define('DEV', true);
define('DOC_ROOT', $parent_config_folder . '/public/');

// Database settings
$type = 'mysql';
$server = '127.0.0.1';
$db = 'phpbook-1';
$port = 3306;
$charset = 'utf8mb4';
$username = 'dev';
$password = 'secret';
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";

// File upload settings
define('UPLOADS', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR);
define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
define('FILE_EXTENSIONS', ['jpeg', 'jpg', 'png', 'gif']);
define('MAX_SIZE', '5242880');
