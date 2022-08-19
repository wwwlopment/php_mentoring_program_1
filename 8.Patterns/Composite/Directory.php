<?php

class Directory implements FileSystemEntity {

    private $name;
    private $size;

    private $childrens;

    public function __construct(string $name, int $size) {
        $this->name = $name;
        $this->size = $size;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSize(): int {
        return $this->size;
    }

    public function add(FileSystemEntity $fsEntity): void {
        $this->childrens[$fsEntity->getName()] = $fsEntity;
    }

    public function remove(FileSystemEntity $fsEntity): void {
            unset($this->childrens[$fsEntity->getName()]);
    }

    public function listContent(): array  {
        return $this->childrens;
    }
}