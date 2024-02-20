<?php include 'includes/head.php' ?>

<table>
    <tr>
        <th class="title" colspan="2">
            Data About Browser Sent in HTTP Headers
        </th>
    </tr>
    <tr>
        <th>Browser's IP address</th>
        <td><?= $_SERVER['REMOTE_ADDR'] ?></td>
    </tr>
    <tr>
        <th>Type of browser</th>
        <td><?= $_SERVER['HTTP_USER_AGENT'] ?></td>
    </tr>
    <tr>
        <th class="title" colspan="2">
            HTTP Request
        </th>
    </tr>
    <tr>
        <th>Host name</th>
        <td><?= $_SERVER['HTTP_HOST'] ?></td>
    </tr>
    <tr>
        <th>URI after host name</th>
        <td><?= $_SERVER['REQUEST_URI'] ?></td>
    </tr>
    <tr>
        <th>Query string</th>
        <td><?= $_SERVER['QUERY_STRING'] ?></td>
    </tr>
    <tr>
        <th>HTTP request method</th>
        <td><?= $_SERVER['REQUEST_METHOD'] ?></td>
    </tr>
    <tr>
        <th class="title" colspan="2">
            Location of the file being executed
        </th>
    </tr>
    <tr>
        <th>Document root</th>
        <td><?= $_SERVER['DOCUMENT_ROOT'] ?></td>
    </tr>
    <tr>
        <th>Path from document root</th>
        <td><?= $_SERVER['SCRIPT_NAME'] ?></td>
    </tr>
    <tr>
        <th>Absolute path</th>
        <td><?= $_SERVER['SCRIPT_FILENAME'] ?></td>
    </tr>
</table>

<?php include 'includes/footer.php' ?>
