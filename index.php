<?php
require './vendor/autoload.php';

use Admin\SchoolChallenge\Clazz;
use Admin\SchoolChallenge\Grade;
use Admin\SchoolChallenge\Statistical;
use Admin\SchoolChallenge\Student;
use Admin\SchoolChallenge\Subject;
use Admin\SchoolChallenge\Teacher;
use Admin\SchoolChallenge\Validation;

class School
{
    // public $class;

    public function __construct($class)
    {
        $this->class = $class;
        if (count($class) < Validation::MIN_CLASSES) {
            throw new Exception('must have at least 2 classes.');
        }
    }

    public function getClasses()
    {
        return $this->class;
    }
}


try {
    //teachers
    $teacher1 = new Teacher('teacher1');
    $teacher2 = new Teacher('teacher2');

    //students
    $student1 = new Student('student1', ['maths', 'science', 'physics']);
    $student2 = new Student('student2', ['maths', 'science', 'physics']);
    $student3 = new Student('student3', ['accounts', 'statistics', 'economics']);
    $student4 = new Student('student4', ['accounts', 'statistics', 'economics']);
    $student5 = new Student('student5', ['maths', 'science', 'physics']);
    $student6 = new Student('student6', ['accounts', 'statistics', 'economics']);
    $students = [$student1, $student2, $student3, $student4, $student5, $student6];
    Grade::assignGrade($students);

    //classes
    $class1 = new Clazz('class1', $teacher1, [$student1, $student2, $student5]);
    $class2 = new Clazz('class2', $teacher2, [$student3, $student4, $student6]);
    // $class3 = new Clazz('diploma', $teacher2, [$student2, $student4, $student6]);

    $school = new School([$class1, $class2]);
    echo "<pre>";
    $studentAverage = Statistical::getStudentByAverageGrade($students);
    print_r('Sorted students by their average grades:');
    echo "<br>";
    foreach($studentAverage as $student){
        echo "<br>";
        echo $student['name']. ' : ' .$student['average'];
    }

    echo "<br>";
    echo "<br>";
    $classAverage = Statistical::getClassesWithBestStudent($school->getClasses());
    print_r('sorted classes with the best students:');
    echo "<br>";
    foreach($classAverage as $class){
        echo "<br>";
        echo $class['name']. ' : ' .$class['average'];
    }

    echo "<br>";
    echo "<br>";
    $subjectAverage = Statistical::getSubjectByAverageGrade($students);
    print_r('sorted classes with the best students:');
    echo "<br>";
    foreach($subjectAverage as $subject){
        echo "<br>";
        echo $subject['subject']. ' : ' .$subject['average'];
    }

} catch (\Exception $e) {
    echo $e->getMessage();
}
