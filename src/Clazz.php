<?php

namespace Admin\SchoolChallenge;

use Exception;

class Clazz
{

    protected $class;
    protected $teacher;
    protected $students;

    public function __construct($class, Teacher $teacher, $students)
    {
        $this->class = $class;
        $this->teacher = $teacher;
        $this->students = $students;

        if (count($students) < Validation::MIN_STUDENT) {
            throw new Exception('Class must have at least 3 Students.');
        }
    }

    public function getName(){
        return $this->class;
    }

    public function getStudent(){
        return $this->students;
    }
}
