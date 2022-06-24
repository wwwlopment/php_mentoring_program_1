<?php

/**
 * See task here: https://www.codewars.com/kata/object-oriented-php-number-7-the-final-keyword
 */

/**
 * Class Person
 */
class Person {

    const species = 'Homo Sapiens';

    /**
     * @var $name
     * @var $age
     * @var $occupation
     */
    public $name;
    public $age;
    public $occupation;

    /**
     * @param $name
     * @param $age
     * @param $occupation
     */
    public function __construct($name, $age, $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    /**
     * @return string
     */
    public function introduce() {
        return 'Hello, my name is ' . $this->name;
    }

    /**
     * @return string
     */
    final public function describe_job() {
        return 'I am currently working as a(n) ' . $this->occupation;
    }

    /**
     * @param $species
     * @return string
     */
    final static public function greet_extraterrestrials($species) {
        return 'Welcome to Planet Earth ' . $species . '!';
    }
}

/**
 * Class ComputerProgrammer
 */
class ComputerProgrammer extends Person {
    /**
     * @return string
     */
    public function introduce()
    {
        return parent::introduce() . ' and I am a ' . $this->occupation;
    }
}
