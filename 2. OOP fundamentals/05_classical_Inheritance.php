<?php
/**
 * See task here: https://www.codewars.com/kata/object-oriented-php-number-5-classical-inheritance
 */

include_once '04_people_practice.php';

/**
 * Class Salesman
 */
class Salesman extends Person {

    /**
     * @param $name
     * @param $age
     */
    public function __construct($name, $age) {
        parent::__construct($name, $age, 'Salesman');
    }

    /**
     * @return string
     */
    public function introduce()
    {
        return parent::introduce() . ', don\'t forget to check out my products!';
    }
}

/**
 * Class ComputerProgrammer
 */
class ComputerProgrammer extends Person {

    /**
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, 'Computer Programmer' );
    }

    /**
     * @return string
     */
    public function describe_job()
    {
        return parent::describe_job() . ', don\'t forget to check out my Codewars account ;)';
    }

}

/**
 * Class WebDeveloper
 */
class WebDeveloper extends ComputerProgrammer {

    /**
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
        $this->occupation = 'Web Developer';
    }

    /**
     * @return string
     */
    public function describe_job()
    {
        return parent::describe_job() . ' And don\'t forget to check on my website :D';
    }

    /**
     * @return string
     */
    public function describe_website() {
        return 'My professional world-class website is made from HTML, CSS, Javascript and PHP!';
    }
}
