<?php
session_start();

$folder = $_SESSION['folder'];
$question1_file = $folder . DIRECTORY_SEPARATOR . 'question1.txt';
$question2_file = $folder . DIRECTORY_SEPARATOR . 'question2.txt';

$question1_file_handle = fopen($question1_file, 'a+');
$question2_file_handle = fopen($question2_file, 'a+');

$comment1 = file_get_contents($question1_file);
$comment2 = file_get_contents($question2_file);

fclose($question1_file_handle);
fclose($question2_file_handle);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files & Folder - On-line Survey</title>
</head>

<body>
    <h1>Question 1</h1>
    <p><?= $comment1 ?></p>

    <h1>Question 2</h1>
    <p><?= $comment2 ?></p>
</body>

</html>
