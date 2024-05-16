<?php

// To handle file uploads, use the `$_FILES` array.
// Using the various authentication and file upload functions, you can control
// who is allowed to upload files and what to do with those files once they're
// on your system.

// The biggest problem with file uploads is the risk of getting a file that is
// too large to process. PHP has two ways of preventing this;
// 1) a hard limit
// 2) a soft limit

// The `upload_max_filesize` option in `php.ini` gives a hard upper limit on
// the size of uploaded file. (2MB by default)

// If your form submits a parameter called `MAX_FILE_SIZE` before any file field
// parameters, PHP uses that value as the soft upper limit.
// e.g. <input type="hidden" name="MAX_FILE_SIZE" value="10240" />
// PHP ignores attempts to set `MAX_FILE_SIZE` to a value larger than
// `upload_max_filesize`.

// Each element in $_FILES is itself an array, giving information about the
// uplaoded file. The keys are:

// name -> The name of the uploaded file as supplied by the browser.
// type -> The MIME type of the uploaded file as guessed at by the client.
// size -> The size of the uploaded file (in bytes). If the user attempted to
// upload a file that was too large, the size would be reported as 0.
// tmp_name -> The name of the temporary file on the server that holds the
// uploaded file. If the user attempted to upload a file that was too large, the
// name is given as `none`.

// The correct way to test wheter a file was successfully uploaded is to use the
// function `is_uploaded_file()` as follows:
// if (is_uploaded_file($_FILES['field_name']['tmp_name'])) { ... }

// Files are stored in the server's default temporary files directory, which is
// specified in `php.ini` with the `upload_tmp_dir` option. To move a file,
// use `move_uploaded_file()` function:
// move_uploaded_file($_FILES['field_name']['tmp_name'], path);
// The call to `move_uploaded_file()` automatically checks whether it was an
// uploaded file. When a script finishes, any file uploaded to that script are
// deleted from the temporary directory.

// ตัวอย่างการ upload file เต็มๆไปดูใน folder php-and-mysql ดีกว่า ข้างล่างแค่ตัวอย่างง่ายๆ

$is_uploaded_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' and is_uploaded_file($_FILES['file']['tmp_name'])) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
    $is_uploaded_success = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploads</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="10240" />
        <label for="file">File:</label>
        <input type="file" name="file" id="file" />
        <input type="submit" value="Upload" />
    </form>

    <?php if ($is_uploaded_success) : ?>
        <img src="uploads/<?= $_FILES['file']['name'] ?>" alt="Uploaded file" />
    <?php endif; ?>
</body>

</html>
