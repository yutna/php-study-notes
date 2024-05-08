<?php

// User-defined ordering requires that you provide a function that takes two
// values and return a value that specifies the order of the two values in the
// sorted array. The function should return 1 if the first value greater than
// the second, -1 if the first value is less than the second, and 0 if the
// values are the same for the purposes of your custom sort order.

function user_sort($a, $b)
{
    // smarts is all-important, so sort it first
    if ($b === 'smarts') {
        return 1;
    } elseif ($a === 'smarts') {
        return -1;
    }

    return ($a === $b) ? 0 : (($a < $b) ? -1 : 1);
}

$values = array(
    'name' => 'Buzz Lightyear',
    'email_address' => 'buzz@starcommand.gal',
    'age' => 32,
    'smarts' => 'some'
);

if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_POST['submitted']) {
    $sort_type = $_POST['sort_type'];

    switch ($sort_type) {
        case 'usort':
        case 'uksort':
        case 'uasort':
            $sort_type($values, "user_sort");
            break;
        default:
            $sort_type($values);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Defined Sorting Array</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <p>
            <input type="radio" name="sort_type" value="sort" checked /> Standard <br />
            <input type="radio" name="sort_type" value="rsort" /> Reverse <br />
            <input type="radio" name="sort_type" value="usort" /> User-defined <br />
            <input type="radio" name="sort_type" value="ksort" /> Key<br />
            <input type="radio" name="sort_type" value="krsort" /> Reverse Key<br />
            <input type="radio" name="sort_type" value="uksort" /> User-defined key<br />
            <input type="radio" name="sort_type" value="asort" /> Value<br />
            <input type="radio" name="sort_type" value="arsort" /> Reverse value<br />
            <input type="radio" name="sort_type" value="uasort" /> User-defined value<br />
        </p>
        <p>
            <input type="submit" name="submitted" value="Sort" />
        </p>
        <p>
            Values <?= array_key_exists('submitted', $_POST) ? 'sorted by ' . $sort_type : 'unsorted' ?>
        </p>
    </form>

    <ul>
        <?php foreach ($values as $key => $value) : ?>
            <li>
                <strong><?= $key ?></strong>
                <?= $value ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
