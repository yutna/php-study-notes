<?php

declare(strict_types=1);

$php_and_mysql_data = [
    'heading' => 'PHP and MySQL - Server-Side Web Development',
    'sections' => [
        'section-a' => [
            [
                'title' => 'Intro',
                'folder_name' => 'intro',
                'pages' => [
                    'echo.php',
                    'comments.php',
                ],
            ],
            [
                'title' => 'Chapter 1: Variables, Expressions and Operators',
                'folder_name' => 'c01',
                'pages' => [
                    'arithmetic-operators.php',
                    'associative-arrays.php',
                    'comparison-operators.php',
                    'echo-shorthand.php',
                    'example.php',
                    'indexed-arrays.php',
                    'logical-operators.php',
                    'multidimensional-arrays.php',
                    'string-operator.php',
                    'updating-arrays.php',
                    'updating-variables.php',
                    'variables.php',
                ],
            ],
            [
                'title' => 'Chapter 2: Control Structures',
                'folder_name' => 'c02',
                'pages' => [
                    'do-while-loop.php',
                    'example.php',
                    'for-loop-higher-counter.php',
                    'for-loop.php',
                    'foreach-loop-just-accessing-values.php',
                    'foreach-loop.php',
                    'if-else-if-statement.php',
                    'if-else-statement.php',
                    'if-statement.php',
                    'include-and-require-files.php',
                    'match.php',
                    'switch-statement.php',
                    'ternary-operator.php',
                    'while-loop.php',
                ],
            ],
            [
                'title' => 'Chapter 3: Functions',
                'folder_name' => 'c03',
                'pages' => [
                    'basic-function.php',
                    'functions-with-return-values.php',
                    'function-with-parameters.php',
                    'global-and-local-scope.php',
                    'global-and-static-variables.php',
                    'functions-with-multiple-values.php',
                    'type-declarations.php',
                    'strict-types.php',
                    'multiple-return-statements.php',
                    'default-values-for-paramters.php',
                    'named-arguments-in-php-8.php',
                    'example.php',
                ],
            ],
            [
                'title' => 'Chapter 4: Objects & Classes',
                'folder_name' => 'c04',
                'pages' => [
                    'objects-and-properties.php',
                    'objects-and-methods.php',
                    'constructor-methods.php',
                    'getters-and-setters.php',
                    'array-in-object.php',
                    'object-in-object.php',
                    'example.php',
                ],
            ],
        ],
        'section-b' => [
            [
                'title' => 'Intro',
                'folder_name' => 'intro',
                'pages' => [
                    'server-superglobal.php',
                    'var-dump.php',
                    'error1.php',
                    'error2.php',
                    'phpinfo.php',
                ],
            ],
            [
                'title' => 'Chapter 5: Built in Functions',
                'folder_name' => 'c05',
                'pages' => [
                    'case-and-character-count.php',
                    'finding-characters.php',
                    'removing-and-replacing-characters.php',
                    'multibyte-string-functions.php',
                    'regular-expression-functions.php',
                    'numeric-functions.php',
                    'array-functions.php',
                    'array-updating-functions.php',
                    'array-sorting-functions.php',
                    'constants.php',
                    'redirect.php',
                    'files.php',
                ],
            ],
            [
                'title' => 'Chapter 6: Getting Data From Browsers',
                'folder_name' => 'c06',
                'pages' => [
                    'get-1.php?city=London',
                    'get-2.php',
                    'get-3.php',
                    'get-4.php',
                    'xss-1.php',
                    'xss-2.php',
                    'xss-3.php',
                    'collecting-form-data.php',
                    'check-for-http-post.php',
                    'check-for-http-get.php',
                    'validate-number-range.php',
                    'validate-text-length.php',
                    'validate-password.php',
                    'validate-options.php',
                    'validate-checkbox.php',
                    'validate-form.php',
                    'filter-input.php',
                    'filter-input-array.php',
                    'validate-input.php',
                    'validate-multiple-inputs.php',
                    'validate-variables.php',
                    'sanitization-filters.php',
                    'validate-form-using-filters.php',
                ],
            ],
            [
                'title' => 'Chapter 7: Images and Files',
                'folder_name' => 'c07',
                'pages' => [
                    'upload-file.php',
                    'move-file.php',
                    'validate-file.php',
                    'resize-gd.php',
                    'resize-im.php',
                    'crop-im.php',
                ],
            ],
            [
                'title' => 'Chapter 8: Dates and Times',
                'folder_name' => 'c08',
                'pages' => [
                    'date-functions.php',
                    'datetime-object.php',
                    'datetime-object-set-date-and-time.php',
                    'dateinterval-object.php',
                    'dateperiod-object.php',
                    'datetimezone-object.php',
                ],
            ],
            [
                'title' => 'Chapter 9: Cookies and Sessions',
                'folder_name' => 'c09',
                'pages' => [
                    'cookies.php',
                    'cookie-preferences.php',
                    'sessions.php',
                    'home.php',
                ],
            ],
            [
                'title' => 'Chapter 10: Error Handling',
                'folder_name' => 'c10',
                'pages' => [],
            ],
        ],
    ],
];

function format_php_and_mysql_dashed_case_to_sentence(string $dashed_case): string
{
    $removed_extension = str_replace(['.php'], '', $dashed_case);
    $removed_dashed = str_replace(['-'], ' ', $removed_extension);

    return ucwords($removed_dashed);
}

function get_php_and_mysql_heading(string $heading_string): string
{
    return '<h1>' . $heading_string . '</h1>';
}

function get_php_and_mysql_section_name_heading(string $section_name): string
{
    return '<h2>' . format_php_and_mysql_dashed_case_to_sentence($section_name) . '</h2>';
}

function get_php_and_mysql_section_content_heading(string $section_content_name): string
{
    return '<h3>' . $section_content_name . '</h3>';
}

function get_php_and_mysql_page_list(string $url, array $pages): string
{
    $html_content = '';

    foreach ($pages as $page) {
        $link_url = $url . '/' . $page;
        $text = format_php_and_mysql_dashed_case_to_sentence($page);

        $html_content .= '<li>';
        $html_content .= "<a target=\"_blank\" href=\"$link_url\">$text</a>";
        $html_content .= '</li>';
    }

    return $html_content;
}

function get_php_and_mysql_section_contents(string $base_url, array $section_contents): string
{
    $html_content = '';

    foreach ($section_contents as $contents) {
        $base_url_with_folder_name = $base_url . '/';

        foreach ($contents as $key => $value) {
            if ($key === 'title') {
                $html_content .= get_php_and_mysql_section_content_heading($value);
            }

            if ($key === 'folder_name') {
                $base_url_with_folder_name .= $value;
            }

            if ($key === 'pages') {
                $html_content .= '<ul>';
                $html_content .= get_php_and_mysql_page_list($base_url_with_folder_name, $value);
                $html_content .= '</ul>';
            }
        }
    }

    return $html_content;
}

function get_php_and_mysql_sections(array $sections): string
{
    $html_content = '';

    foreach ($sections as $section_name => $section_contents) {
        $path_url = PHP_OS === "Darwin" ? '/php-and-mysql/' : '/php-playground/php-and-mysql/';
        $base_url_with_section_name = $path_url . $section_name;

        $html_content .= get_php_and_mysql_section_name_heading($section_name);
        $html_content .= get_php_and_mysql_section_contents($base_url_with_section_name, $section_contents);
    }

    return $html_content;
}

function get_php_and_mysql_contents(): string
{
    global $php_and_mysql_data;
    $html_content = '';

    foreach ($php_and_mysql_data as $key => $value) {
        if ($key === 'heading') {
            $html_content .= get_php_and_mysql_heading($value);
        }

        if ($key === 'sections') {
            $html_content .= get_php_and_mysql_sections($value);
        }
    }

    return $html_content;
}
