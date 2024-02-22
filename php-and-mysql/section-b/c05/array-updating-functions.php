<?php
$order = ['notebook', 'pencil', 'eraser'];
array_unshift($order, 'scissors'); // ['scissors', 'notebook', 'pencil', 'eraser']
array_pop($order); // ['scissors', 'notebook', 'pencil']
$item = implode(', ', $order); // scissors, notebook, pencil

$classes = [
    'Patchwork' => 'April 12th',
    'Knitting' => 'May 4th',
    'Lettering' => 'May 18th',
];
array_shift($classes); // ['Knitting' => 'May 4th', 'Lettering' => 'May 18th']

$new = [
    'Origami' => 'June 5th',
    'Quilting' => 'June 23rd'
];

$classes = array_merge($classes, $new);
// [
//    'Knitting' => 'May 4th',
//    'Lettering' => 'May 18th',
//    'Origami' => 'June 5th',
//    'Quilting' => 'June 23rd'
// ]
?>

<?php include 'includes/header.php'; ?>

<h1>Order</h1>
<?= $item ?>

<h1>Classes</h1>
<?php foreach ($classes as $description => $date) { ?>
    <strong><?= $description ?></strong>
    <?= $date ?>
    <br>
<?php } ?>

<?php include 'includes/footer.php'; ?>
