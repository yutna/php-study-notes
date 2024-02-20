<?php
$tax_rate = 0.2;

function calculate_running_total($price, $quantity)
{
    global $tax_rate;
    static $running_total = 0;

    $cost = $price * $quantity;
    $tax = $cost * $tax_rate;
    $total = $cost + $tax;
    $running_total = $running_total + $total;

    return $running_total;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global and Static Variables</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Store</h1>
    <table>
        <thead>
            <tr>
                <th>ITEM</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>RUNNING TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mint</td>
                <td>$2</td>
                <td>5</td>
                <td><?= calculate_running_total(2, 5) ?></td>
            </tr>
            <tr>
                <td>Toffee</td>
                <td>$3</td>
                <td>5</td>
                <td><?= calculate_running_total(3, 5) ?></td>
            </tr>
            <tr>
                <td>Fudge</td>
                <td>$5</td>
                <td>4</td>
                <td><?= calculate_running_total(5, 4) ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
