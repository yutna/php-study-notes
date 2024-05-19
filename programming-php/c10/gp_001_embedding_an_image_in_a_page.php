<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embedding an Image in a Page</title>
</head>

<body>
    This page contains images.
    <img src="images/image1.png" alt="Image 1">
    <img src="images/image2.png" alt="Image 2">

    <!--
    Instead of referring to real images on your web server, the <img> tags now
    refer to the PHP script that generate and return image data.

    เพิ่งรู้ว่าแท็ก img สามารถ src ไปที่ PHP ไฟล์เพื่อให้ PHP dynamic generated image แบบนี้ได้
    ด้วย น่าสนใจๆ
    -->

    <!--
    <img src="image1.php?num=1" alt="Image 1">
    <img src="image2.php?num=2" alt="Image 2">
    -->
</body>

</html>
