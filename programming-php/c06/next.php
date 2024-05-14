<?php

declare(strict_types=1);

require_once "Log.php";
session_start();

function serialization_next_page_example()
{
    $now = date("r");
    $logger = $_SESSION["logger"];
    $logger->write("Viewed page 2 at {$now}");

    echo "<p>The log contains:";
    echo nl2br($logger->read());
    echo "</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialization Example - Next page</title>
</head>

<body>
    <?php serialization_next_page_example(); ?>
</body>

</html>
