<?php

// Database settings
$type = 'mysql';
$server = '127.0.0.1';
$db = 'phpbook-1';
$port = '3306';
$charset = 'utf8mb4';

$username = 'dev';
$password = 'secret';

$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";

// Document setting
define('DOC_ROOT', dirname(mb_substr(__DIR__, mb_strlen($_SERVER['DOCUMENT_ROOT']))) . '/public');

// Environment setting
define('DEV', true);

// File upload settings
define('FILE_EXTENSIONS', ['jpeg', 'jpg', 'png', 'gif']);
define('MAX_SIZES', 5242880);
define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
define('UPLOADS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR);
