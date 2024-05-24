<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>

<body>
    <?php if (!empty($_GET['name'])) : ?>
        <p>Thank you for filling out the form, <?= $_GET['name'] ?></p>
    <?php else : ?>
        <p>Please enter the following information: </p>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
            <table>
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</body>

</html>
