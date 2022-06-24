<?php
/**
 *  1. Define a class called President using the syntax taught above.
 *  2. Inside the curly braces of the class definition, add a public property called $name and set it equal to the string "Barack Obama".
 *  3. Then, define a public method inside the President class called greet which accepts one argument $name and returns something to the effect of
 *     "Hello INSERT_NAME_HERE, my name is Barack Obama, nice to meet you!"
 *  4. Now that you have defined your class, create an instance of that class (called an object) and store it in a variable called $us_president.
 *  5. Store the name of the $us_president into another variable called $president_name.
 *  6. Store the result of calling the greet method of $us_president with the argument "Donald" into the variable $greetings_from_president.
 */

/**
 * Class President
 */
class President {
    /**
     * @var string
     */
    public $name = 'Barack Obama';

    /**
     * @param $name
     * @return string
     */
    public function greet($name) {
        return 'Hello ' . $name . ', my name is ' . $this->name . ', nice to meet you!';
    }
}


$us_president = new President();
$president_name = $us_president->name;
$greetings_from_president = $us_president->greet('Donald');