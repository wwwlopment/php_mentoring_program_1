<?php

abstract class FileRepository  implements RepositoryInterface {


    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }


    public function set($params) {
        return $this->writeToFile($params);
    }

    public function getAll() {
        return $this->readFromFile();
    }

    public function search($params) {
        return $this->searchInFile($params);
    }

    abstract protected function writeToFile($params): bool;

    abstract protected function readFromFile(): array;

    abstract protected function searchInFile($params): ?Model;
}