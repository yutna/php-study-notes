<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>By reference</title>
    <style>
        body {
            color: #58595B;
            font-family: Gotham, Arial, Helvetica, sans-serif;
            background-color: #f7f7f7;
        }
    </style>
</head>

<body>
    <h1>Variable assignment by references</h1>
    <p>
        p530 - 531 discussed assigning values by reference.<br>
        here are some examples to illustrate the concepts discussed on that page.
    </p>

    <h2>Assigning variable value</h2>
    <?php
    $greeting1 = 'Hi';
    $welcome1 = $greeting1;
    $greeting1 = 'Hello';
    ?>
    <p>The value of <code>$greeting1</code> and <code>$welcome1</code> will be different.</p>
    <p>
        <code>$greeting1:</code> <?= $greeting1 ?><br>
        <code>$welcome1:</code> <?= $welcome1 ?><br>
        <code>$greeting1:</code> <?= $greeting1 ?><br>
    </p>

    <h2>Passing variable by reference into function</h2>
    <?php
    $current_count = 0;

    function update_counter(&$counter)
    {
        $counter++;
    }

    update_counter($current_count);
    update_counter($current_count);
    update_counter($current_count);
    ?>
    <p>
        The <code>$current_count</code> variable is declared outside of the function.
        Its value is updated bacause it is passed by reference to the function.
    </p>
    <p>
        <code>$current_count</code>: <?= $current_count ?>
    </p>
</body>

</html>
