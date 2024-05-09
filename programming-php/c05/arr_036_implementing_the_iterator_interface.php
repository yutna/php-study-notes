<?php

declare(strict_types=1);

header('Content-Type: text/plain');

// Using the `foreach` construct, you can iterate NOT only over arrays, but also
// over instances of classes that implement the `Iterator` interface.
// To implement the `Iterator` interface, you must implement 5 methods on your
// class.

// 1) `current()` -> Returns the element currently pointed at by the iterator
// 2) `key()` -> Returns the key for the element currently pointed at by the iterator
// 3) `next()` -> Moves the iterator to the next element in the object and return it
// 4) `rewind()` -> Moves the iterator to the first element in the array.
// 5) `valid()` -> Returns `true` if the iterator currently points at a valid
// element, and false otherwise.

class BasicArray implements Iterator
{
    private $position = 0;
    private $array = ['first', 'second', 'third'];

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): mixed
    {
        return $this->array[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        $this->position += 1;
    }

    public function valid(): bool
    {
        return isset($this->array[$this->position]);
    }
}

$basic_array = new BasicArray();

foreach ($basic_array as $value) {
    echo "{$value}\n";
}

// first
// second
// third

foreach ($basic_array as $key => $value) {
    echo "{$key} => {$value}\n";
}

// 0 => first
// 1 => second
// 2 => third

// NOTE:
// When you implement the `Iterator` interface on a class, it allows you only to
// traverse elements in instances of that class using the `foreach` construct;
// It does NOT allow you to treat those instance as arrays or parameters to
// other methods
// อย่างเช่น เราจะเรียก iterator function construct บน $basic_array ไม่ได้
// rewind($basic_array) 🙅‍♀️
