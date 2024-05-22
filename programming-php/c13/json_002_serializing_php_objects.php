<?php

// There is no direct translation between PHP objects and JSON objects
// What JSON call an `object` is really an associative array.
// To convert JSON data into an instance of a PHP object class, you must write
// code to do so based on the format returned by the API.

// However, the `JsonSerializable` interface allows you to convert objects into
// JSON data however you like. If an object class does NOT implement the
// interface, `json_encode()` simply creates a JSON object containing keys and
// values corresponding to the object's data members.

// Otherwise, `json_encode()` calls the `jsonSerialize()` method on the class
// and uses that to serialize the object's data.

class Book implements JsonSerializable
{
    public $id;
    public $name;
    public $edition;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function jsonSerialize(): mixed
    {
        $data = array(
            'id' => $this->id,
            'name' => $this->name,
            'edition' => $this->edition
        );

        return $data;
    }
}

class Author implements JsonSerializable
{
    public $id;
    public $name;
    public $books = array();

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function jsonSerialize(): mixed
    {
        $data = array(
            'id' => $this->id,
            'name' => $this->name,
            'books' => $this->books
        );

        return $data;
    }
}

class ResourceFactory
{
    static public function authorFromJSON($jsonData)
    {
        $author = new Author($jsonData['id']);
        $author->name = $jsonData['name'];

        foreach ($jsonData['books'] as $bookIndentifier) {
            $author->books[] = new Book($bookIndentifier);
        }

        return $author;
    }

    static public function bookFromJSON($jsonData)
    {
        $book = new Book($jsonData['id']);
        $book->name = $jsonData['name'];
        $book->edition = (int) $jsonData['edition'];

        return $book;
    }
}

$book = new Book(1);
$book->name = 'PHP Programming';
$book->edition = 2;

$json = json_encode($book);

$book_from_factory = ResourceFactory::bookFromJSON(json_decode($json, true));
var_dump($book_from_factory);

// ฟัง์ชั่น json_decode มี options ให้เลือกใช้มากมาย ลองไปศึกษาเพิ่มเติมดู
// https://www.php.net/manual/en/function.json-decode.php
