<?php

class Author implements JsonSerializable
{
    public $id;
    public $name;

    public function __construct($properties = array())
    {
        $this->id = $properties['id'] ?? null;
        $this->name = $properties['name'] ?? null;
    }

    public function jsonSerialize(): mixed
    {
        $data = array(
            'id' => $this->id,
            'name' => $this->name
        );

        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }
}
