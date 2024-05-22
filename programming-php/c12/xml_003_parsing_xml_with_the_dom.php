<?php

header('Content-Type: text/plain');

// Instead of firing events and allowing you to handle the document as it is
// being parsed, the DOM parser takes an XML document and returns an entire tree
// of nodes and elements.

// แต่ข้อเสียคือของ DOM parser คือ ยิ่งซับซ้อน ยิ่งใช้ memory เยอะ

function process_nodes($node)
{
    foreach ($node->childNodes as $child) {
        switch ($child->nodeType) {
            case XML_TEXT_NODE:
                echo $child->nodeValue;
                break;
            case XML_ELEMENT_NODE:
                process_nodes($child);
                break;
        }
    }
}

$xml_file = __DIR__ . DIRECTORY_SEPARATOR . 'books.xml';

$parser = new DOMDocument();
$parser->load($xml_file);

process_nodes($parser->documentElement);
