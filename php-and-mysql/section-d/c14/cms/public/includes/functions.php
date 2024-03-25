<?php

function create_filename(string $filename, string $upload_path): string
{
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = preg_replace('/[^A-z0-9]/', '-', $basename);
    $filename = $basename . '.' . $extension;
    $i = 0;

    while (file_exists($upload_path . $filename)) {
        $i += 1;
        $filename = $basename . $i . '.' . $extension;
    }

    return $filename;
}

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

function redirect(string $location, array $parameters = [], $response_code = 302)
{
    $qs = $parameters ? '?' . http_build_query($parameters) : '';
    $location = $location . $qs;

    header("Location: $location", true, $response_code);
    exit;
}

set_error_handler('handle_error');
function handle_error($error_type, $error_message, $error_file, $error_line)
{
    throw new ErrorException($error_message, 0, $error_type, $error_file, $error_line);
}

set_exception_handler('handle_exception');
function handle_exception($e)
{
    error_log($e);
    http_response_code(500);
    echo "<h1>Sorry, a problem occurred</h1>
          <p>The site's owners have been informed, Please try again later.</p>";
}

register_shutdown_function('handle_shutdown');
function handle_shutdown()
{
    $error = error_get_last();

    if ($error !== null) {
        $e = new ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']);
        handle_exception($e);
    }
}
