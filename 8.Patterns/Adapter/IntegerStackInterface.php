<?php

interface IntegerStackInterface {
    public function push(int $integer): void;

    public function pop(): int;
}