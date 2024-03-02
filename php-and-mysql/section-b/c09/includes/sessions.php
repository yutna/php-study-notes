<?php

declare(strict_types=1);
session_start();

$logged_in = $_SESSION['logged_in'] ?? false;

$email = 'example@example.com';
$password = 'secret';

function login()
{
    session_regenerate_id(true);
    $_SESSION['logged_in'] = true;
}

function logout()
{
    $_SESSION = [];
    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    session_destroy();
}

function redirect_to_account_page()
{
    header('Location: account.php');
    exit;
}

function require_login(bool $logged_in)
{
    if ($logged_in == false) {
        header('Location: login.php');
        exit;
    }
}
