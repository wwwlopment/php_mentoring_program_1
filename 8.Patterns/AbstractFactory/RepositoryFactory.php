<?php

class RepositoryFactory {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getFactory($type)  {
    switch ($type) {
        case 'file':
            $factory = new FileRepository($this->model);
            break;
        case 'db':
            $factory = new DBRepository($this->model);
            break;
        default:
            throw new \Exception("Unknown factory type [{$type}]");
    }

    return $factory;
}

}