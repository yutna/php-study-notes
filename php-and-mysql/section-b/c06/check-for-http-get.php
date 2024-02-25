<?php include 'includes/header.php'; ?>

<?php
$submitted = $_GET['sent'] ?? '';

if ($submitted === 'search') {
    $term = $_GET['term'] ?? '';
    echo 'You searched for ' . htmlspecialchars($term);
} else {
?>
    <form action="check-for-http-get.php" method="GET">
        <input type="hidden" name="sent" value="search">
        Search for: <input type="text" name="term">
        <input type="submit" value="search">
    </form>
<?php } ?>

<?php include 'includes/footer.php'; ?>
