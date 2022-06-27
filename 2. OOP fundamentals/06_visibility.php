<?php


/**
 *   See task here: https://www.codewars.com/kata/object-oriented-php-number-6-visibility
 */

/**
 * Class Person
 */
class Person
{

    /**
     * @var $name
     * @var $age
     * @var $occupation
     */
    protected $name;
    protected $age;
    protected $occupation;

    /**
     * @param $name
     * @param $age
     * @param $occupation
     */
    public function __construct($name, $age, $occupation)
    {
        self::validate(compact('name', 'age', 'occupation'));

        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    /**
     * @param $data
     * @return void
     */
    protected static function validate($data) {
        foreach ($data as $var_name => $value){
            switch ($var_name) {
                case 'name':
                case 'occupation':
                    if (!is_string($value)) {
                        throw new InvalidArgumentException(ucfirst($var_name) . ' must be a string!');
                    }
                    break;
                case 'age':
                    if (!is_int($value) || $value < 0) {
                        throw new InvalidArgumentException(ucfirst($var_name) . ' must be a non-negative integer!');
                    }
                    break;
            }
        }
    }

    /**
     * @return string
     */
    public function get_name() {
        return $this->name;
    }

    /**
     * @return numeric
     */
    public function get_age() {
        return $this->age;
    }

    /**
     * @return string
     */
    public function get_occupation() {
        return $this->occupation;
    }


    /**
     * @param $name
     * @return void
     */
    public function set_name($name) {
        self::validate(['name' => $name]);
        $this->name = $name;
    }

    /**
     * @param $age
     * @return void
     */
    public function set_age($age) {
        self::validate(['age' => $age]);
        $this->age = $age;
    }

    /**
     * @param $occupation
     * @return void
     */
    public function set_occupation($occupation) {
        self::validate(['occupation' => $occupation]);
        $this->occupation = $occupation;
    }
}

