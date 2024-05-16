<?php
$attrs = $_GET['attributes'] ?? [];
$personality_attributes = array(
    'perky' => 'Perky',
    'morose' => 'Morose',
    'thinking' => 'Thinking',
    'feeling' => 'Feeling',
    'thrifty' => 'Spend-Thrift',
    'prodigal' => 'Shopper'
);

function make_checkboxes($name, $query, $options)
{
    foreach ($options as $value => $label) {
        $checked = in_array($value, $query) ? 'checked' : '';
        $input_checkbox = <<<CHECKBOX
        <label>
            <input type="checkbox" name="{$name}" value="{$value}" {$checked} />
            $label
        </label>
        <br />
        CHECKBOX;

        echo $input_checkbox;
    }
}

if (array_key_exists('s', $_GET)) {
    $description = join(' ', $_GET['attributes']);
    $message = sprintf("You have a %s personality.", $description);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Multivalued Parameters</title>
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
        Select your personality attributes: <br />
        <?php make_checkboxes('attributes[]', $attrs, $personality_attributes); ?>
        <br />
        <input type="submit" name="s" value="Record my personality!" />
    </form>

    <?php if (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>

</html>
