<?php
$name = 'Ivy';
$greeting = 'Hello';

if ($name) {
    $greeting = 'Welcome back, ' . $name;
}

$product = 'Lollipop';
$cost = 10;

for ($i = 1; $i <= 20; $i++) {
    $subtotal = $cost * $i;
    $discount = ($subtotal / 100) * ($i * 4);
    $totals[$i] = $subtotal - $discount;
}
?>

<?php require_once 'includes/header.php' ?>

<p><?= $greeting ?></p>
<p><?= $product ?> Discounts</p>
<table>
    <thead>
        <tr>
            <th>Packs</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($totals as $quantity => $price) { ?>
            <tr>
                <td><?= $quantity ?> pack<?= ($quantity === 1) ? '' : 's' ?></td>
                <td>$<?= $price ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include 'includes/footer.php' ?>
