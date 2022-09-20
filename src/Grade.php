<?php

namespace Admin\SchoolChallenge;

class Grade
{

    protected $grade;
    // protected $subject;
    public function __construct()
    {
        $this->grade = rand(1, 5);
        // $this->subject = $subject;

    }

    public function getGrade()
    {
        return $this->grade;
    }

    public static function assignGrade($students)
    {
        foreach ($students as $key => $student) {
            foreach ($student->getSubjects() as $subject) {
                $subject->setGrade();
            }
        }
    }
    // public function getSubject()
    // {
    //     return $this->subject;
    // }
}
