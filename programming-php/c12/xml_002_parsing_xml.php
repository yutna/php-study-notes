<?php

// PHP includes three XML parsers:
// 1) The event-based library
// 2) DOM-based library
// 3) SimpleXML

// The event-based library, which lets you parse but NOT validate XML documents
// PHP's event-based XML parser calls various handler functions you provide
// while it reads the document as it encounters certain `events`, such as the
// beginning or end of an element.

// -----------------------------------------------------------------------------

// Element Handlers

// When the parser encounters the beginning or end of an element, it calls the
// start and end element handlers. You set the handlers through the
// `xml_set_element_handler()` function.
// xml_set_element_handler(parser, start_element, end_element);
// The `start_element` and `end_element` parameters are the names of the handler
// functions.

// The start element handler is called when the XML parser encounters the
// beginning of an element:
// start_element_handler(parser, element, &attributes);
// The start element handler is passed three parameters:
// 1) a reference to the XML parser calling the handler.
// 2) The name of the element that was opened.
// 3) An array containing any attributes the parser encountered for the element.
// The &attributes array is passed by reference for speed.

function start_element($parser, $name, $attributes)
{
    $output_attributes = array();

    if (count($attributes)) {
        foreach ($attributes as $key => $value) {
            $output_attributes[] = <<<ATTR
            <font color="gray">
                {$key}="{$value}"
            </font>
            ATTR;
        }
    }

    echo "&lt;<b>{$name}</b> " . join(' ', $output_attributes) . '&gt;';
}

// The end element handler is called when the parser encounters the end of an
// element.
// end_element_handler(parser, element);
// It takes two parameters:
// 1) A reference to the XML parser calling the handler.
// 2) The name of the element that is closing.

function end_element($parser, $name)
{
    echo "&lt;<b>/{$name}</b>&gt;";
}

// -----------------------------------------------------------------------------

// Character Data Handler

// All of the text between elements (character data, or CDATA in XML
// terminology) is handled by the character data handler. The handler you set
// with the `xml_set_character_data_handler()` function is called after each
// block of character data:
// xml_set_character_data_handler(parser, handler);
// The character data handler takes in a reference to the XML parser that
// triggered the handler and a string containing the character data itself:
// character_data_handler(parser, cdata);

function character_data($parser, $data)
{
    echo $data;
}

// -----------------------------------------------------------------------------

// Processing Instructions

// Processing instructions are used in XML to embed scripts or other code into
// a document. PHP itself can be seen as a processing instruction and, with the
// <? php ... ? > tag style, follows the XML format for demarking the code.
// The XML parser calls the processing instruction handler when it encounters a
// processing instruction. Set the handler with the
// `xml_set_processing_instruction_handler()` function.
// A processing instruction look like:
// < ? target instruction ? >

// The processing instruction handler takes in a reference to the XML parser
// that triggered the handler, the name of the target (for example, 'php'), and
// the processing instruction:
// process_instruction_handler(parser, target, instruction);

// What you do with a processing instruction is up to you. One trick is to embed
// PHP code in an XML document and, as you parse that document, execute the PHP
// code with the eval() function.

// Of course, you have to trust the documents you are processing if you include
// the eval() code in them. eval() will run any code given to it--even code that
// destroys files or mails passwords to a cracker. In practice, executing
// arbitrary code like this is extremely dangerous.

function processing_instruction($parser, $target, $code)
{
    if ($target === 'php') {
        eval($code);
    }
}

// -----------------------------------------------------------------------------

// Entity Handlers

// Entities in XML are placeholders. XML provides five standard entities
// 1) &amp;
// 2) &gt;
// 3) &lt;
// 4) &quot;
// 5) &apos;
// But XML document can define their own entities. Most entity definitions do
// NOT trigger events, and the XML parser expands most entities in documents
// before calling the other handlers.

// Two type of entities
// 1) External entities
// 2) Unparsed entities
// Have special support in PHP's XML library.

// An external entity is one whose replacement text is identified by a filename
// or URL rather than explicitly given in the XML file. You can define a handler
// to be called for occurrences of external entities in character data, but it's
// up to you to parse the contents of the file or URL yourself if that's what
// you want.

// An unparsed entity must be accompanied by a notation declaration, and while
// you can define handlers for declarations of unparsed entities and notation,
// occurrences of unparsed entities are deleted from the text before the
// character data handler is called.

// -----------------------------------------------------------------------------

// External Entities

// External entity references allow XML documents to include other XML documents.
// Typically, an external entity reference handler opens the referenced file,
// parses the file, and includes the results in the current document. Set the
// handler with `xml_set_external_entity_ref_handler()`, which takes in a
// reference to the XML parser and the name of the handler function:
// xml_set_external_ref_handler(parser, handler);

// The external entity reference handler takes five parameters:
// 1) The parser triggering the handler.
// 2) The entity's name,
// 3) The URI for resolving the identifier of the entity. (which is currently
// always empty).
// 4) The system identifier (such as the filename).
// 5) The public identifier for the entity.
// external_entity_handler(parser, entity, base, system, public);

// If your external entity reference handler return false (which it will if it
// returns no value), XML parsing stops with an
// `XML_ERROR_EXTERNAL_ENTITY_HANDLING` error. If it returns true, parsing
// continues.

// ตั้งชื่อ _mock ให้มันไม่ซ้ำกับตัวอย่างข้างล่างเฉยๆ
function create_parser_mock($system_id)
{
    // Creating the XML parser.
}

function parse_mock($parser, $fp)
{
    // Feeding the XML parser.
}

function external_entity_reference($parser, $names, $base, $system_id, $public_id)
{
    if ($system_id) {
        if (!list($parser, $fp) = create_parser_mock($system_id)) {
            echo "Error opening external entity {$system_id}\n";
            return false;
        }

        return parse_mock($parser, $fp);
    }

    return false;
}

// -----------------------------------------------------------------------------

// Unparsed entities

// An unparsed entity declaration must be accompanied by a notation declaration:
// <!DOCTYPE doc[
//     <!NOTATION jpeg SYSTEM "image/jpeg">
//     <!ENTITY logo SYSTEM "php-tiny.jpg" NDATA jpeg>
// ]>

// Register a notation declaration handler with
// xml_set_notation_decl_handler(parser, handler);

// The handler will be called with five parameters:
// notation_handler(parser, notation, base, system, public);
// base, system, public คำอธิบายเหมือนหัวข้อข้างบนที่ผ่านมา แต่
// Either the system identifier or the public identifier for the notation will
// be set, but NOT both.

// Use this function to register an unparsed entity declaration
// xml_set_unparsed_entity_decl_handler(parser, handler)
// The handler will be called with six parameters
// unparsed_entity_handler(parser, entity, base, system, public, notation)
// The notation parameter identifies the notation declaration with which this
// unparsed entity is associated.

// -----------------------------------------------------------------------------

// Default Handler

// For any other event, such as the XML declaration and the XML document type,
// the default handler is called. Call this function to set the default handler.
// xml_set_default_handler(parser, handler);

// The handler will be called with two parameters:
// default_handler(parser, text);

// The text parameter will have different values depending on the kind of event
// triggering the default handler.

function default_handler($parser, $data)
{
    echo "<font color=\"red\">XML: Default handler called with '{$data}'</font>";
}

// -----------------------------------------------------------------------------

// Options

// The XML parser has several options you can set to control the source and
// target encodings and case folding. Use this function to set an option:
// xml_parser_set_option(parser, option, value);

// Similarly, use this function to interrogate a parser about its options:
// $value = xml_parser_get_option(parser, option);

// -----------------------------------------------------------------------------

// Character encoding

// Use the constant `XML_OPTION_TARGET_ENCODING` to get or set the encoding of
// the text passed to callbacks. Allowable values are
// 1) "ISO-8859-1" (default)
// 2) "US_ASCII"
// 3) "UTF-8"

// -----------------------------------------------------------------------------

// Case Folding

// By default, element and attribute names in XML document are converted to all
// uppercase. You can turn off this behavior (and get case-sensitive element
// names) by settings the `XML_OPTION_CASE_FOLDING` option to false with the
// xml_parser_set_option(XML_OPTION_CASE_FOLDING, false);

// -----------------------------------------------------------------------------

// Skipping Whitespace-only

// Set the `XML_OPTION_SKIP_WHITE` option to ignore values consisting entirely
// of whitespace characters.
// xml_parser_set_option(XML_OPTION_SKIP_WHITE, true);

// -----------------------------------------------------------------------------

// Truncating tag names

// When creating a parser, you can optionally have it truncate characters at the
// start of each tag name. To truncate the start of each tag by a number of
// characters, provide that value in the `XML_OPTION_SKIP_TAGSTART`
// xml_parser_set_option(XML_OPTION_SKIP_TAGSTART, 4);

// -----------------------------------------------------------------------------

// Using the Parser

// To use the XML parser, create a parser with `xml_parser_create()`, set
// handlers and options on the parser, and then hand chunks of data to the
// parser with the `xml_parse()` function until either the data run out or the
// parser return an error. Once the processing is complete, free the parser by
// calling `xml_parser_free()`.

// The `xml_parser_create()` function returns an XML parser:
// $parser = xml_parser_create([encoding]);
// The optional encoding parameter specifies the text encoding ("ISO-8859-1",
// "US-ASCII", or "UTF-8") of the file being parsed.

// The `xml_parse()` function returns true if the parse was successful and false
// if it was not:
// $success = xml_parse(parser, data[, final ]);
// The data argument is a string of XML to process. The optional final parameter
// should be true for the last piece of data to be parsed.

// The `xml_parse()` function returns false if there was an error. If something
// did go wrong, use `xml_get_error_code()` to fetch a code identifying the
// error.
// $error = xml_get_error_code($parser);
// The error code corresponds to one of these error constants:
// https://www.php.net/manual/en/xml.error-codes.php
// The constants generally are NOT very useful. Use `xml_error_string()` to turn
// an error code into a string that you can use when you report the error:
// $message = xml_error_string(code);

// $error = xml_get_error_code($parser);
//
// if (!$error != XML_ERROR_NONE) {
//     die(xml_error_string($error));
// }

// To easily deal with nested documents, write functions that create the parser
// and set its options and handlers for you. This puts the optional and handler
// settings in one place rather than duplicating them in the external entity
// reference handler e.g.
function create_parser($filename)
{
    $file_handler = fopen($filename, 'r');
    $parser = xml_parser_create();

    xml_set_element_handler($parser, 'start_element', 'end_element');
    xml_set_character_data_handler($parser, 'character_data');
    xml_set_processing_instruction_handler($parser, 'processing_instruction');
    xml_set_default_handler($parser, 'default_handler');

    return array($parser, $file_handler);
}

function parse($parser, $file_handler)
{
    $block_size = 4 * 1024; // read in 4 KB chunks

    while ($data = fread($file_handler, $block_size)) {
        if (!xml_parse($parser, $data, feof($file_handler))) {
            $error_string = xml_error_string($parser);
            $line_number = xml_get_current_line_number($parser);

            echo "Parse error: {$error_string} at line {$line_number}\n";

            return false;
        }
    }

    return true;
}

if (list($parser, $file_handler) = create_parser("bookstore.xml")) {
    parse($parser, $file_handler);
    fclose($file_handler);
    xml_parser_free($parser);
}

// -----------------------------------------------------------------------------

// Methods as Handlers

// Use the `xml_set_object()` function to register an object with a parser,
// After you do so, the XML parser looks for the handlers as methods on that
// object, rather than as global functions:
// xml_set_object(object);

// -----------------------------------------------------------------------------

// ให้ดูตัวอย่างในไฟล์ bookparse.php เอา แต่ว่าตัวอย่างไม่สมบูรณ์นะ มี error แต่ก็พอดูเพื่อเป็น idea
// เอาไปใช้ implement ในอนาคตได้
