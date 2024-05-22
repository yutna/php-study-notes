<?php

// Extensible Stylesheet Language Transformations (XSLT) is a language for
// transforming XML documents into different XML, HTML, or any other format.

// Three documents are involved in an XSLT transformation
// 1) The original XML document
// 2) The XSLT document containing transformation rules
// 3) The resulting document
// The final document does NOT have to be in XML; in fact, it's common to use
// XSLT to generate HTML from XML.

// To do an XSLT transformation in PHP, you create an XSLT processor, give it
// some input to transform, and then destroy the processor.

// Create a processor
// $processor = new XsltProcessor;

// Parse the XML and XSL files into DOM objects
// $xml = new DOMDocument();
// $xml->load($filename);
// $xsl = new DOMDocument();
// $xsl->load($filename);

// Attach the XML rules to the object
// $processor->importStylesheet($xsl);

// Process a file with the `transformToDoc()`, `transformToUri()`, or
// `transformToXml()` methods
// $result = $processor->transformToXml($xml);

$feed = __DIR__ . DIRECTORY_SEPARATOR . 'feed.xml';
$rules = __DIR__ . DIRECTORY_SEPARATOR . 'rules.xsl';

$processor = new XSLTProcessor();

$xsl = new DOMDocument();
$xsl->load($rules);
$processor->importStylesheet($xsl);

$xml = new DOMDocument();
$xml->load($feed);
$result = $processor->transformToXml($xml);

echo "<pre>{$result}</pre>";
