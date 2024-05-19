<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamically Generated Buttons</title>
    <style>
        img {
            display: block;
            width: 500px;
            height: auto;
        }
    </style>
</head>

<body>
    <img src="images/img-dynamic-button.php?text=<?= urlencode('PHP Button') ?>&size=120" alt="Button">
</body>

</html>
