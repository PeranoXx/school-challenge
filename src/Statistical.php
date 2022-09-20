<?php

namespace Admin\SchoolChallenge;

class Statistical
{

    
    //Sorted students by their average grades
    public static function getStudentByAverageGrade($students)
    {
        foreach ($students as $student) {
            // print_r($student->getSubjects());
            $studentAverageGrade = [
                'name' =>  $student->getName(),
                'average' => self::getStudentAverageGrade($student->getSubjects())
            ];
            $avgGrade[] =  $studentAverageGrade;
        }
        $sort = array_column($avgGrade, 'average');
        array_multisort($sort, SORT_DESC, $avgGrade);
        return array_slice($avgGrade, 0, 3);
    }


    //Sorted classes with the best students:
    public static function getClassesWithBestStudent($classes)
    {
        foreach ($classes as $class) {
            $classGrade = self::getAllStudentGradesFromClass($class->getStudent());
            $classAverageGrade = [
                'name' =>  $class->getName(),
                'average' => round(array_sum($classGrade) / count($classGrade), 1)
            ];
            $avgGrade[] =  $classAverageGrade;
        }
        $sort = array_column($avgGrade, 'average');
        array_multisort($sort, SORT_DESC, $avgGrade);
        return $avgGrade;
    }

    public static function getSubjectByAverageGrade($students)
    {
        $test = [];
        foreach ($students as $student) {
            foreach ($student->getSubjects() as $subject) {
                $test[$subject->getName()][] = $subject->getGrade();
            }
        }
        foreach ($test as $key => $t) {
            $subjectAverageGrade = [
                'subject' => $key,
                'average' => round(array_sum($t) / count($t), 1)
            ];
            $avgGrade[] =  $subjectAverageGrade;
        }
        $sort = array_column($avgGrade, 'average');
        array_multisort($sort, SORT_DESC, $avgGrade);
        return $avgGrade;
        
    }

    public static function getAllStudentGradesFromClass($students)
    {
        foreach ($students as $student) {
            $avgGradeStudent[] =  self::getStudentAverageGrade($student->getSubjects());
        }
        return $avgGradeStudent;
    }

    public static function getStudentAverageGrade($subjects)
    {
        foreach ($subjects as $subject) {
            $avg[] = $subject->getGrade();
        }
        return round(array_sum($avg) / count($avg), 1);
    }

    public static function getSubjectsName($subjects)
    {
        foreach ($subjects as $subject) {
            $avg[] = $subject->getSubject()->getName();
        }
        return $avg;
    }
}
