<?php

class PersonController {

    protected $repository;

    public function __construct() {
        $this->repository = (new RepositoryFactory(new Person()))->getFactory('file');
    }

    public function savePerson(Person $person): void {
        $this->repository->savePerson($person);
    }

    public function readPeople(): array {
        return $this->repository->readPeople();
    }

    public function readPerson(string $name): ?Person {
        return $this->repository->readPerson($name);
    }
}