<?php

declare(strict_types=1);

function html_escape(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
}
