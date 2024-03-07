<?php

function handle_exception($e)
{
    error_log($e);
    http_response_code(500);
    require_once 'header.php';

    echo "<h1>Sorry, a problem occurred</h1>
         <p>The site's owners have been informed. Please try again later.</p>";

    require_once 'footer.php';

    exit;
}

function handle_error($type, $message, $file = '', $line = 0)
{
    throw new ErrorException($message, 0, $type, $file, $line);
}

function handle_shutdown()
{
    $error = error_get_last();
    var_dump($error);

    if ($error) {
        $error = new ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']);
        handle_exception($error);
    }
}

set_exception_handler('handle_exception');
set_error_handler('handle_error');
register_shutdown_function('handle_shutdown');
