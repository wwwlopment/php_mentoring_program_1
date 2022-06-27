<?php

/**
 * https://www.codewars.com/kata/object-oriented-php-number-9-abstract-classes-advanced
 */

abstract class Person {
    /**
     * @var $name
     * @var $age
     * @var $gender
     */
    public $name;
    public $age;
    public $gender;

    /**
     * @param $name
     * @param $age
     * @param $gender
     */
    public function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    abstract public function introduce ();

    /**
     * @param $name
     * @return string
     */
    public function greet($name) {
        return 'Hello '. $name;
    }
}

/**
 *
 */
final class Child extends Person {
    /**
     * @var array
     */
    public $aspirations = [];

    /**
     * @param $name
     * @param $age
     * @param $gender
     * @param $aspirations
     */
    public function __construct($name, $age, $gender, $aspirations)
    {
        parent::__construct($name, $age, $gender);
        $this->aspirations = $aspirations;
    }

    /**
     * @return string
     */
    public function introduce() {
        return 'Hi, I\'m '. $this->name .' and I am '. $this->age .' years old';
    }

    /**
     * @param $name
     * @return string
     */
    public function greet($name) {
        return 'Hi '. $name .', let\'s play!';
    }

    /**
     * @param $arr
     * @return string
     */
    public function say_list($arr){
        return implode(', ', $arr);
    }

    /**
     * @return string
     */
    public function say_dreams() {
        return 'I would like to be a(n) '. $this->say_list($this->aspirations) .'when I grow up.';
    }
}

/**
 *
 */
class ComputerProgrammer extends Person {
    /**
     * @var string
     */
    public $occupation = 'Computer Programmer';

    /**
     * @return string
     */
    public function introduce() {
        return 'Hello, my name is '. $this->name .', I am '. $this->age .' years old and I am a(n) '. $this->occupation;
    }

    /**
     * @param $name
     * @return string
     */
    public function greet($name) {
        return 'Hello '. $name .', I\'m '. $this->name .', nice to meet you';
    }

    /**
     * @return string
     */
    public function advertise() {
        return 'Don\'t forget to check out my coding projects';
    }
}