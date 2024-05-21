<?php
require_once('BookList.php');

$xml_file = __DIR__ . DIRECTORY_SEPARATOR . 'books.xml';
$library = new BookList($xml_file);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
</head>

<body>
    <?php
    if (isset($_GET['isbn'])) {
        $library->showBook($_GET['isbn']);
    } else {
        $library->showMenu();
    }
    ?>
</body>

</html>
