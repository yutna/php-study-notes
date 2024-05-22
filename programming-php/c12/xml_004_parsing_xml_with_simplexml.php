<?php

header('Content-Type: text/plain');

// If you're consuming very simple XML documents, you might consider the third
// library provided by PHP, SimpleXML. SimpleXML does NOT have ability to
// generate documents as the DOM extension does, and is NOT as flexible or
// memory-efficient as the event-driven extension, but it makes it very easy to
// read, parse, and traverse simple XML documents.

// SimpleXML takes a file, string, or DOM document (produced using the DOM
// extension) and generates an object. Properties on that object are arrays
// providing access to elements in each node. With those arrays, you can access
// elements using numeric indices and attributes using non-numberic indices,
// Finally, you can use string conversion on any value you retrieve to get the
// text value of the item.

$xml_file = __DIR__ . DIRECTORY_SEPARATOR . 'books.xml';
$document = simplexml_load_file($xml_file);

foreach ($document->book as $book) {
    echo $book->title . "\r\n";
}

echo "\n------------------------------------------------------------------\n\n";

// Using the children() method on the object, you can iterate over the child
// nodes of a given node; likewise, you can use the attributes() method on the
// object to iterate over the attributes of the node;

foreach ($document->book as $node) {
    foreach ($node->attributes() as $attribute) {
        echo $attribute . "\n";
    }
}

echo "\n------------------------------------------------------------------\n\n";

// Finally, using the asXml() method on the object, you can retrieve the XML of
// the document in XML format. This lets you change values in your document and
// write it back out to disk easily:

foreach ($document->book as $book) {
    $book->title = "New Title";
}

file_put_contents('custom-books.xml', $document->asXML());
