<?php
$greetings = ['Hi ', 'Howdy ', 'Hello ', 'Hola ', 'Welcome ', 'Ciao '];
$greeting_key = array_rand($greetings);
$greeting = $greetings[$greeting_key];

$bestsellers = ['notebook', 'pencil', 'ink'];
$bestseller_count = count($bestsellers);
$bestseller_text = implode(', ', $bestsellers);

$customer = [
    'forename' => 'Ivy',
    'surname' => 'Stone',
    'email' => 'ivy@eg.link',
];

if (array_key_exists('forename', $customer)) {
    $greeting .= $customer['forename'];
}

var_dump(array_search('xxx', $customer));
?>

<?php include 'includes/header.php'; ?>

<h1>Best Seller</h1>
<p><?= $greeting ?></p>
<p>
    Our top <?= $bestseller_count ?> items today are
    <strong><?= $bestseller_text ?></strong>
</p>

<?php include 'includes/footer.php'; ?>
