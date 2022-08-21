<?php

abstract class DBRepository  implements RepositoryInterface {

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function set($params) {
        $this->save($params);
    }

    public function getAll() {
        $this->get();
    }

    public function search($params) {
        $this->get($params);
    }

    abstract protected function save($params): bool;

    abstract protected function get($params = null): ?Model;
}