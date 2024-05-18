<?php

session_start();

$folder = $_SESSION['folder'];
$filename = $folder . DIRECTORY_SEPARATOR . 'question2.txt';

$file_handle = fopen($filename, 'a+');
$comments = file_get_contents($filename);
fclose($file_handle);

if (!empty($_POST['posted'])) {
    $question2 = $_POST['question2'];
    $file_handle = fopen($filename, 'w+');

    if (flock($file_handle, LOCK_EX)) {
        if (fwrite($file_handle, $question2) === false) {
            echo "Cannot write to file ({$filename})";
        }

        flock($file_handle, LOCK_UN);
    }

    fclose($file_handle);
    header('Location: last_page.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Files & Folder - On-line Survey</title>
        <style>
            table {
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }
        </style>
    </head>

    <body>
        <table>
            <tr>
                <td>
                    Please enter your comments to the following survey statement:
                </td>
            </tr>
            <tr style="background-color: lightblue;">
                <td>
                    It's funny thing freedom, I mean how can any of use <br>
                    be really free when we still have personal possessions.
                    How do you respond to the previous statement?
                </td>
            </tr>
            <tr>
                <td>
                    <form id="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" name="posted" value="1"><br>
                        <textarea name="question2" rows="12" cols="35"><?= $comments ?></textarea>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Submit" form="form">
                </td>
            </tr>
        </table>
    </body>

    </html>
<?php } ?>
