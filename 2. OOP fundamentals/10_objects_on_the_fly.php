<?php

/**
 * https://www.codewars.com/kata/object-oriented-php-number-10-objects-on-the-fly-advanced
 */


$object_oriented_php = new class () {

    /**
     * @var string
     */
    public $description = 'An amazing PHP Kata Series, complete with 10 top-quality Kata containing a large number 
                            of both fixed and random tests, that teaches both the fundamentals of object-oriented programming 
                            in PHP (in the first 7 Kata of this Series) and more advanced OOP topics in PHP (in the last 3 Kata 
                            of this Series) such as interfaces, abstract classes and even anonymous classes in a way that stimulates 
                            critical thinking and encourages independent research';
    /**
     * @var string[]
     */
    public $kata_list = [
        'Object-Oriented PHP #1 - Classes, Public Properties and Methods',
        'Object-Oriented PHP #2 - Class Constructors',
        'Object-Oriented PHP #3 - Constants, Static methods',
        'Object-Oriented PHP #4 - People, Pratice',
        'Object-Oriented PHP #5 - Classical Inheritance',
        'Object-Oriented PHP #6 - Visibility',
        'Object-Oriented PHP #7 - Final keyword',
        'Object-Oriented PHP #8 - Interfaces',
        'Object-Oriented PHP #9 - Abstract Classes',
        'Object-Oriented PHP #10 - Objects on the fly',
    ];
    /**
     * @var int
     */
    public $kata_count = 10;
    /**
     * @var
     */
    public $author;

    public function __construct() {
        $this->author = (new class () {
            public $name = 'Donald';
            public $age = 17;
            public $gender = 'Male';
            public $occupation = 'Computer Programmer';

            public function getString() {
                return $this->name . ', aged ' . $this->age . ', who is a ' . strtolower($this->occupation) . ' proficient in Javascript and PHP and is a PHP enthusiast';
            }
        })->getString();
    }

    /**
     * @param $name
     * @return string
     */
    public function advertise($name) {
        return 'Hey '. $name .', don\'t forget to check out this great PHP Kata Series authored by Donald called \"Object-Oriented PHP\"';
    }

    /**
     * @param $kata_number
     * @return string
     */
    public function get_kata_by_number($kata_number) {
        if ($kata_number < 1 || $kata_number > 10) {
            throw new InvalidArgumentException($kata_number . ' is not an integer in the range of 1 to 10');
        }
        return $this->kata_list[$kata_number];
    }

    /**
     * @return string
     */
    public function complete() {
        return 'Hooray, I\'ve finally completed the entire \"Object-Oriented PHP\" Kata Series!!!';
    }
};
