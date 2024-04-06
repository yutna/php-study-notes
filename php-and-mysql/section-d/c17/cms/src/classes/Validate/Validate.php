<?php

namespace PhpBook\Validate;

class Validate
{
    public static function isCategoryId($category_id, array $category_list): bool
    {
        foreach ($category_list as $category) {
            if ($category_id == $category['id']) {
                return true;
            }
        }

        return false;
    }

    public static function isEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    public static function isMemberId($member_id, array $member_list): bool
    {
        foreach ($member_list as $member) {
            if ($member_id == $member['id']) {
                return true;
            }
        }

        return false;
    }

    public static function isNumber($number, $min = 0, $max = 100): bool
    {
        return ($number >= $min) && ($number <= $max);
    }

    public static function isPassword($password): bool
    {
        if ((mb_strlen($password) >= 8) and
            preg_match('/[A-Z]/', $password) and
            preg_match('/[a-z]/', $password) and
            preg_match('/[0-9]/', $password)
        ) {
            return true;
        }

        return false;
    }

    public static function isText($text, $min = 0, $max = 1000): bool
    {
        $length = mb_strlen($text);
        return ($length >= $min) && ($length <= $max);
    }
}
