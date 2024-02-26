<?php

declare(strict_types=1);

function is_number($number, int $min = 0, int $max = 0): bool
{
    return ($number >= $min) && ($number <= $max);
}

function is_text($text, int $min = 0, int $max = 100): bool
{
    $length = mb_strlen($text);
    return ($length >= $min) && ($length <= $max);
}

function is_password(string $password): bool
{
    if ((mb_strlen($password) >= 8) &&
        preg_match('/[A-Z]/', $password) &&
        preg_match('/[a-z]/', $password) &&
        preg_match('/[0-9]/', $password)
    ) {
        return true;
    }

    return false;
}
