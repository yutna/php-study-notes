<?php

// Calling a function for each array element
// PHP provides a mechanism, array_walk(), for calling a user-defined function
// once per element in an array
// array_walk(array, callable);
// The function you define takes in two or, optionally, three arguments:
// 1) The element value
// 2) The element key
// 3) The value supplied to array_wolk() when it called

$print_row = function ($value, $key) {
    print("<tr><td>{$key}</td><td>{$value}</td></tr>");
};

$person = array(
    'name' => 'Fred',
    'age' => 35,
    'wife' => 'Betty'
);

echo "<table border=\"1\">";
array_walk($person, $print_row);
echo "</table>";

echo "<br/><hr /><br/>";

// Third option example

function print_row_with_bgcolor($value, $key, $color)
{
    $row = <<<ROW
    <tr>
        <td style="background-color: {$color};">{$key}</td>
        <td style="background-color: {$color};">{$value}</td>
    </tr>
    ROW;

    echo $row;
}

echo "<table border=\"1\">";
array_walk($person, 'print_row_with_bgcolor', 'lightblue');
echo "</table>";

echo "<br/><hr /><br/>";

// If you have multiple options you want to pass to the called function, simply
// pass an array in as a third parameter
$extra_data = array('border' => 2, 'color' => 'red');
$base_array = array('Ford', 'Chrysler', 'Volkswagen', 'Honda', 'Toyota');

function walk_func($item, $index, $data)
{
    echo "{$item} <- item, then border: {$data['border']}";
    echo " color->{$data['color']}<br />";
}

array_walk($base_array, 'walk_func', $extra_data);
