<?php
/**
 * 1. Copy your working solution to the first Kata of this series and paste it here (you may want to complete that first if you haven't already done so).
 * 2. Rename that class to CurrentUSPresident.
 * 3. Convert all of the class properties into class constants and all of the class methods into static methods using the syntax taught in the lesson.
 * 4. You can safely remove the code where an instance of the President class is created.
 */

/**
 * Class CurrentUSPresident
 */
class CurrentUSPresident {

    const name = 'Barack Obama';

    /**
     * @param $name
     * @return string
     */
    public static function greet($name) {
        return 'Hello ' . $name . ', my name is ' . self::name . ', nice to meet you!';
    }
}


$president_name = CurrentUSPresident::name;
$greetings_from_president = CurrentUSPresident::greet('Donald');