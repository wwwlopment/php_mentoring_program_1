<?php

class PersonFacade {

    private $people;

    public function __construct() {
        $this->people = (new PersonController());
    }

    public function whoIsTheSmarter(string $person1Name, string $person2Name): Person {

    }

    public function transferIq(string $fromName, string $toName, int $amountToTransfer): void {

    }

    public function changeIqByDelta(string $personName, int $delta): void {

    }

    public function run($person1Name, $person2Name, $amount, $delta) {
        $person1 = $this->people->readPerson($person1Name);
        $person2 = $this->people->readPerson($person2Name);
        $person = $this->whoIsTheSmarter($person1, $person2);
        $this->transferIq($person1, $person2, $amount);
        $this->changeIqByDelta($person->getName(), $delta);
    }
}