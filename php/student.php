<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 4/30/2017
 * Time: 12:41 AM
 */
include_once "person2.php";
class Student extends Person {
    protected $classList = array();
    public function __construct($name,$dateOfBirth,$classList) {
        $this->classList = $classList;
        // Double colon to gain access to a method of a class without instance
        parent::__construct($name,$dateOfBirth);
    }
    public function __get($prop) {
        // Using "if" to avoid returning function every time
        if($prop=="classList"){
                return implode(" | ",$this->classList);
        }
        return parent::__get($prop);
    }
}

$student = new Student("Ben",new DateTime("1985-12-21"),array("CS101","CS105","WD202"));
/**echo $student->classList;
echo "<br>";
echo $person->name;
echo "<br>";
echo $student->age;*/