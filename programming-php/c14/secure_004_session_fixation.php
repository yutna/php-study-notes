<?php
session_start();

// This effectively prevents session fixation attacks by ensuring that any user
// who logs in is assigned a fresh, random session identifier.

function check_auth($username, $password)
{
    // Validate username, password for user authentication
    // suppose its returns true
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (check_auth($_POST['username'], $_POST['password'])) {
        $_SESSION['auth'] = true;
        session_regenerate_id(true);
    }
}
