<?php
  require_once 'config/const.php';
  require_once 'contents/php-and-mysql.php';
  require_once 'lib/format-dashed-case-to-sentence.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Playground</title>
  </head>
  <body>
    <?= get_php_and_mysql_contents(BASE_PHP_AND_MYSQL_URL, $php_and_mysql_data) ?>
  </body>
</html>
