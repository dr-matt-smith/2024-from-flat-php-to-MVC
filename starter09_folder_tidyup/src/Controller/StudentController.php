<?php

namespace Tudublin\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tudublin\Student;
use Tudublin\StudentFixtures;

class StudentController
{
    const TEMPLATE_HOME = __DIR__ . '/../../templates';

    #[Route('/show', name: 'student_show')]
    public function show(): void
    {
        $student = new Student();
        $student->setName('Matt Smith');
        $student->setYear(4);
        require_once self::TEMPLATE_HOME . '/student/show.php';
    }

    #[Route('/list', name: 'student_list')]
    public function list(): void
    {
        $studentFixtures = new StudentFixtures();
        $students = $studentFixtures->getStudentArray();
        require_once self::TEMPLATE_HOME . '/student/list.php';
    }
}