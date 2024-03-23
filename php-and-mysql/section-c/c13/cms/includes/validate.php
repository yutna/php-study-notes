<?php

function is_category_id($category_id, array $category_list): bool
{
    foreach ($category_list as $category) {
        if ($category_id == $category['id']) {
            return true;
        }
    }

    return false;
}

function is_member_id($member_id, array $member_list): bool
{
    foreach ($member_list as $member) {
        if ($member_id == $member['id']) {
            return true;
        }
    }

    return false;
}

function is_number($number, $min = 0, $max = 100): bool
{
    return ($number >= $min) && ($number <= $max);
}

function is_text($text, $min = 0, $max = 1000): bool
{
    $length = mb_strlen($text);
    return ($length >= $min) && ($length <= $max);
}
