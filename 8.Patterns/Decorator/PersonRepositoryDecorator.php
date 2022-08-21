<?php

class PersonRepositoryDecorator implements PersonRepositoryInterface {

    protected $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository) {
        $this->personRepository = $personRepository;
    }

    public function savePerson(Person $person): void {
        $person->name = strtoupper($person->name);
        $this->personRepository->savePerson($person);
    }

    public function readPeople(): array {
        return array_map(function ($people){
            return strtolower($people);
        }, $this->personRepository->readPeople());
    }

    public function readPerson(string $name): ?Person {
        return $this->personRepository->readPerson(strtolower($name));
    }

}