<?php

class IntegerStackAdapter implements IntegerStackInterface {

    private $adapterObj;

    public function __construct() {
        $this->adapterObj = new ASCIIStack();
    }

    public function push(int $integer): void {
        $this->adapterObj->push(strval($integer));
    }

    public function pop(): int {
        return $this->adapterObj->pop();
    }
}