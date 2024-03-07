<?php

declare(strict_types=1);

include 'classes/ImageHandler.php';

$message = '';
$thumb = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if ($_FILES['image']['error'] === 0) {
        $file = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];

        try {
            $image = new ImageHandler($temp, $file);
            $thumb = $image->resizeImage(300, 300, 'uploads/');
            $message = '<img alt="Uploaded image" src="' . $thumb . '">';
        } catch (ImageHandlerException $e) {
            $message = $e->getMessage();
        } catch (Throwable $e) {
            $message = 'We were unable to save your image';
            error_log($e);
        }
    }

    $message = 'Thank you for registering<br>' . $message;
}
?>

<?php include 'includes/header.php'; ?>

<h1>Join Us</h1>
<?= $message ?>

<?php if (!$message) { ?>
    <form action="throwing-exceptions.php" enctype="multipart/form-data" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
        </div>
        <div>
            <label for="image">Picture:</label>
            <input type="file" name="image" id="image">
        </div>
        <input type="submit" value="Save">
    </form>
<?php } ?>

<?php include 'includes/footer.php'; ?>
