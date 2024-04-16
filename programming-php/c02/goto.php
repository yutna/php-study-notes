<?php

$error = true;

for ($i = 0; $i < 10; $i++) {
    if ($error) {
        goto cleanup;
    }
}

cleanup:
echo "After cleanup";
