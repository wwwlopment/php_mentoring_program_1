<?php

/**
 * See task here: https://www.codewars.com/kata/object-oriented-php-number-8-interfaces-advanced
 */

interface CanFly {
    /**
     * @return mixed
     */
    public function fly();
}

interface CanSwim {
    /**
     * @return mixed
     */
    public function swim();
}

interface CanClimb {
    /**
     * @return mixed
     */
    public function climb();
}

interface CanGreet {
    /**
     * @param $name
     * @return mixed
     */
    public function greet($name);
}

interface CanIntroduce {
    /**
     * @return mixed
     */
    public function speak();

    /**
     * @return mixed
     */
    public function introduce();
}

interface CanSpeak {
    /**
     * @return mixed
     */
    public function speak();
}

/**
 *- class Bird
 */
class Bird implements CanFly {

    /**
     * @var
     */
    public $name;

    /**
     * @param $name
     */
    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function fly() {
        return 'I am flying';
    }

    /**
     * @return string
     */
    public function chirp() {
        return 'Chirp chirp';
    }
}

/**
 *- class Duck
 */
class Duck extends Bird implements CanFly, CanSwim {

    /**
     * @return string
     */
    public function swim() {
        return 'Splash! I\'m swimming';
    }

    /**
     * @return string
     */
    public function chirp() {
        return 'Quack quack';
    }
}

/**
 * class Cat
 */
class Cat implements CanClimb {

    /**
     * @return string
     */
    public function climb() {
        return 'Look, I\'m climbing a tree';
    }

    /**
     * @return string
     */
    public function meow() {
        return 'Meow meow';
    }

    /**
     * @param $name
     * @return string
     */
    public function play($name) {
        return 'Hey '. $name .', let\'s play!';
    }
}

/**
 * class Dog
 */
class Dog implements CanSwim, CanGreet {

    /**
     * @return string
     */
    public function swim() {
        return 'I\'m swimming, woof woof';
    }

    /**
     * @param $name
     * @return string
     */
    public function greet($name) {
        return 'Hello '. $name .', welcome to my home';
    }

    /**
     * @return string
     */
    public function bark() {
        return 'Woof woof';
    }
}

/**
 * class Person
 */
class Person implements CanGreet, CanIntroduce {

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
     * @param $name
     * @return string
     */
    public function greet($name) {
        return 'Hello '. $name .', how are you?';
    }

    /**
     * @return string
     */
    public function speak() {
        return 'What am I supposed to say again?';
    }

    /**
     * @return string
     */
    public function introduce() {
        return 'Hello, my name is '. $this->name .', I am '. $this->age .' years old and I am currently working as a(n) '. $this->occupation;
    }
}

