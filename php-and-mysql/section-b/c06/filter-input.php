<?php include 'includes/header.php'; ?>

<a href="filter-input.php?city=London">London</a>
<a href="filter-input.php?city=Sydney">Sydney</a>
<?php $location = filter_input(INPUT_GET, 'city'); ?>
<pre><?php var_dump($location); ?></pre>

<?php include 'includes/footer.php'; ?>
