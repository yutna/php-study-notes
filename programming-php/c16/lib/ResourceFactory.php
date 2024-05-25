<?php

require_once 'Author.php';

class ResourceFactory
{
    public static function authorFromJSON($json)
    {
        $author = new Author($json);
        return $author;
    }
}
