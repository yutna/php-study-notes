<?php

require_once('xmlrpc-epi/sample/utils/utils.php');

$options = array(
    'output_type' => 'xml',
    'version' => 'xmlrpc'
);

$result = xu_rpc_http_concise(
    array(
        'method' => 'multiply',
        'args' => array(5, 6),
        'host' => 'http://php-playground.test',
        'uri' => '/programming-php/c16/xml_rpc_server.php',
        'options' => $options
    )
);

echo "5 * 6 is {$result}";

// RECHECK: ไม่สามารถรันได้เพราะ dl method ใน util.php มันถูก deprecate ไปแล้ว 🤯
