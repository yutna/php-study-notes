<?php

$db = null;

if (is_resource($db)) {
    echo "db is resource";
} else {
    echo "db is NOT resource"; // print this statement
}
