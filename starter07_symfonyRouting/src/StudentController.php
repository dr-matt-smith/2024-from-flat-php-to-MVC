<?php

namespace Tudublin;

class StudentController
{
    public function show(): void
    {
        $student = new Student();
        $student->setName('Matt Smith');
        $student->setYear(4);
        require_once __DIR__ . '/../templates/show.php';
    }


    public function list(): void
    {
        $studentFixtures = new StudentFixtures();
        $students = $studentFixtures->getStudentArray();
        require_once __DIR__ . '/../templates/list.php';
    }
}