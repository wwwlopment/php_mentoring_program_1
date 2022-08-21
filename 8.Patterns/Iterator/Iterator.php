<?php

class Iterator implements StringIterator {

    private $collection;
    private $position = 0;

    public function __construct($collection) {
        $this->collection = $collection;
    }
    public function hasNext(): bool {
        return isset($this->collection[$this->position + 1]);
    }

    public function getNext(): ?string {
        $this->position++;
    }
}