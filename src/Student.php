<?php

namespace Admin\SchoolChallenge;

use Exception;

class Student extends Subject
{

    protected $name;
    // protected $subject;
    public function __construct($name, $subject)
    {
        $this->name = $name;

        //validation
        if (count($subject) < Validation::MIN_SUBJECT) {
            throw new Exception('Student must take at least 3 Subjects.');
        }

        $this->studentSubject($subject);
    }

    public function studentSubject($subject)
    {
        foreach ($subject as $sub) {
            // $subjects[] =  new Grade(rand(1, 5), $sub);
            $subjects[] =  new Subject($sub);

        }
        $this->subject = $subjects;
        // $this->subject[0]->setGrade();
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function getSubjects()
    {
        return $this->subject;
    }
}
