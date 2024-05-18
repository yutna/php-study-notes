<?php

session_start();

$folder = $_SESSION['folder'];
$filename = $folder . DIRECTORY_SEPARATOR . 'question1.txt';

// Open file for reading then clean it out
$file_handle = fopen($filename, 'a+');

// Pick up any text in the file that may already be there
$comments = file_get_contents($filename);
fclose($file_handle); // close this handle

if (!empty($_POST['posted'])) {
    $question1 = $_POST['question1'];
    $file_handle = fopen($filename, 'w+');

    if (flock($file_handle, LOCK_EX)) {
        if (fwrite($file_handle, $question1) === false) {
            echo "Cannot write to file ({$filename})";
        }

        flock($file_handle, LOCK_UN);
    }

    fclose($file_handle);
    header('Location: survey_2.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Files & Folders - On-line Survey</title>
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
                    Please enter your response to the followed survey question.
                </td>
            </tr>
            <tr style="background-color: lightblue;">
                <td>
                    What is your opinion on the state of the world economy?
                    <br />
                    Can you help us fix it?
                </td>
            </tr>
            <tr>
                <td>
                    <form id="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" name="posted" value="1" />
                        <br />
                        <textarea name="question1" rows="12" cols="35"><?= $comments ?></textarea>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Submit" form="form" />
                </td>
            </tr>
        </table>
    </body>

    </html>
<?php } ?>
