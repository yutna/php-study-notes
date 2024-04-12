<?php
$db = new mysqli('localhost', 'dev', 'secret', 'library');

if ($db->connect_error) {
    die("Connect Error ({$db->connect_errno}) {$db->connect_error}");
}

$sql = "SELECT *
        FROM books
        WHERE available = 1
        ORDER BY title";

$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Querying the books database</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th colspan="3">
                    <strong>These books are currently available</strong>
                </th>
            </tr>
            <tr>
                <th>Title</th>
                <th>Year Published</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo stripslashes($row['title']) ?></td>
                    <td><?php echo $row['pub_year'] ?></td>
                    <td><?php echo $row['ISBN'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
