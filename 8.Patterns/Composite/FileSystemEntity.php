<?php

interface FileSystemEntity {

    public function getName(): string;

    public function getSize(): int;
}