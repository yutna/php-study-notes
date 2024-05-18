<?php

session_start();

if (!empty($_POST['posted']) && !empty($_POST['email'])) {
    $folder = __DIR__ . DIRECTORY_SEPARATOR . 'surveys' . DIRECTORY_SEPARATOR . strtolower($_POST['email']);
    $_SESSION['folder'] = $folder;

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    header('Location: survey_1.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>File & Folders - On-line Survey</title>
    </head>

    <body>
        <h2>Survey Form</h2>
        <p>Please enter your e-mail address to start recording your comments</p>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="posted" value="1" />
            <p>
                Email address:
                <input type="text" name="email" size="45" />
                <br />
                <input type="submit" name="submit" value="Submit" />
            </p>
        </form>
    </body>

    </html>
<?php } ?>
