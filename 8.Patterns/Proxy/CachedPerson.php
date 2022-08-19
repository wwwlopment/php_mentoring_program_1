<?php

class CachedPerson {

    private $cache;
    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository) {
        $this->personRepository = $personRepository;
    }

    public function readPerson(string $name) {
        if (!isset($this->cache[$name])){
            $result = $this->personRepository->readPerson($name);
            $this->cache[$name] = $result;
            return $result;
        }
        return $this->cache[$name];
    }
}