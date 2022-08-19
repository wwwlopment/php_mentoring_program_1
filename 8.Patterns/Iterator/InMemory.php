<?php

class InMemory implements StringCollection {

    public function getIterator(): StringIterator {
        return new Iterator($this);
    }
}