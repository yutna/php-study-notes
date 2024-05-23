<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clean = array();
    $length = mb_strlen($_POST['username']);

    $is_valid_length = ($length > 0) && ($length <= 32);

    // RECHECK: ctype_<...> ฟังก์ชั่นกลุ่มนี้น่าสนใจ 🤔
    if (ctype_alnum($_POST['username']) && $is_valid_length) {
        $clean['username'] = $_POST['username'];
    } else {
        // ERROR
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtering Input 2</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
