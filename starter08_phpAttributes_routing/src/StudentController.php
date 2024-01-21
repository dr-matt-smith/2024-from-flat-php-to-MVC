<?php

namespace Tudublin;

use Symfony\Component\Routing\Annotation\Route;

class StudentController
{
    #[Route('/show', name: 'student_show')]
    public function show(): void
    {
        $student = new Student();
        $student->setName('Matt Smith');
        $student->setYear(4);
        require_once __DIR__ . '/../templates/show.php';
    }

    #[Route('/list', name: 'student_list')]
    public function list(): void
    {
        $studentFixtures = new StudentFixtures();
        $students = $studentFixtures->getStudentArray();
        require_once __DIR__ . '/../templates/list.php';
    }
}