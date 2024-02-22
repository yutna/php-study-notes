<?php
$order = ['notebook', 'pencil', 'scissors', 'eraser', 'ink', 'washi', 'tape'];
sort($order); // ['eraser', 'ink', 'notebook', 'pencil', 'scissors', 'tape', 'washi']
$items = implode(', ', $order);

$classes = [
    'Patchwork' => 'April 12th',
    'Knitting' => 'May 4th',
    'Origami' => 'June 8th',
];
krsort($classes);
// [
//     'Knitting' => 'May 4th',
//     'Origami' => 'June 8th',
//     'Patchwork' => 'April 12th'
// ]
?>

<?php include 'includes/header.php'; ?>

<h1>Order</h1>
<?= $items ?>

<h1>Classes</h1>
<?php foreach ($classes as $description => $date) { ?>
    <strong><?= $description ?></strong>
    <?= $date ?>
    <br>
<?php } ?>

<?php include 'includes/footer.php'; ?>
