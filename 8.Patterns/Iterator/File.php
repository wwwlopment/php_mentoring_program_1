<?php

class File implements StringCollection {

    public function getIterator(): StringIterator {
        return new Iterator($this);
    }
}