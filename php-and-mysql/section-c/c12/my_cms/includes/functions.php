<?php

function format_date(string $string): string
{
    $date = strtotime($string);
    return date('F d, Y', $date);
}

function html_escape(string | null $text): string
{
    $text = $text ?? '';
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false);
}

function pdo(PDO $pdo, string $sql, array $arguments = null): PDOStatement
{
    if (!$arguments) {
        return $pdo->query($sql);
    }

    $statement = $pdo->prepare($sql);
    $statement->execute($arguments);

    return $statement;
}
