<?php

namespace Admin\SchoolChallenge;

class Subject extends Grade
{

    protected $subject;
    // protected $grade;
    
    public function __construct($subject)
    {
        $this->subject = $subject;
        // $this->teacher = $teacher;
        // $this->grade = new Grade();
    }

    public function getName(){
        return $this->subject;
    }

    public function setGrade()
    {
        $this->grade = new Grade();
    }

    public function getGrade()
    {
        return $this->grade->getGrade();
    }


}
