<?php

class BookList
{
    const FIELD_TYPE_SINGLE = 1;
    const FIELD_TYPE_ARRAY = 2;
    const FIELD_TYPE_CONTAINER = 3;

    // RECHECK: ไม่เห็นมีในหนังสือเลย โดยเฉพาะบท OOP
    // มันเป็น style การเขียน syntax แบบเก่าของ PHP หรอ 🤔
    var $parser;
    var $record;
    var $currentField = '';
    var $fieldType;
    var $endsRecord;
    var $records;

    function __construct($filename)
    {
        $xml = join('', file($filename));

        $this->parser = xml_parser_create();
        $this->endsRecord = array('book' => true);
        $this->fieldType = array(
            'title' => self::FIELD_TYPE_SINGLE,
            'author' => self::FIELD_TYPE_ARRAY,
            'isbn' => self::FIELD_TYPE_SINGLE,
            'comment' => self::FIELD_TYPE_SINGLE
        );

        xml_set_object($this->parser, $this);
        xml_set_element_handler($this->parser, 'elementStarted', 'elementEnded');
        xml_set_character_data_handler($this->parser, 'handleCdata');

        xml_parse($this->parser, $xml);
        xml_parser_free($this->parser);
    }

    function elementStarted($parser, $element, $attributes)
    {
        $element = strtolower($element);

        if (array_key_exists($element, $this->fieldType)) {
            $this->currentField = $element;
        } else {
            $this->currentField = '';
        }
    }

    function elementEnded($parser, $element)
    {
        $element = strtolower($element);

        if (array_key_exists($element, $this->endsRecord)) {
            $this->records[] = $this->record;
            $this->record = array();
        }

        $this->currentField = '';
    }

    function handleCdata($parser, $text)
    {
        if (array_key_exists($this->currentField, $this->fieldType)) {
            switch ($this->fieldType[$this->currentField]) {
                case self::FIELD_TYPE_SINGLE:
                    $this->record[$this->currentField] = $text;
                    break;
                case self::FIELD_TYPE_ARRAY:
                    $this->record[$this->currentField][] = $text;
                    break;
            }
        }
    }

    function showMenu()
    {
        echo "<table>";

        foreach ($this->records as $book) {
            $author = join(', ', $book['author']);
            $row = <<<ROW
            <tr>
                <th>
                    <a href="{$_SERVER['PHP_SELF']}?isbn={$book['isbn']}">
                        {$book['title']}
                    </a>
                </th>
                <td>
                    {$author}
                </td>
            </tr>
            ROW;

            echo $row;
        }

        echo "</table>";
    }

    function showBook($isbn)
    {
        foreach ($this->records as $book) {
            if ($book['isbn'] !== $isbn) {
                continue;
            }

            $author = join(', ', $book['author']);
            $content = <<<CONTENT
            <p>
                <b>{$book['title']}</b> by {$author} <br>
                ISBN: {$book['isbn']} <br>
                Comment: {$book['comment']}
            </p>
            CONTENT;

            echo $content;
        }

        $back = <<<BACK
        <p>
            Back to the
            <a href="{$_SERVER['PHP_SELF']}">
                list of books
            </a>.
        </p>
        BACK;

        echo $back;
    }
}
