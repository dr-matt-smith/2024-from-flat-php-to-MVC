<?php

namespace Tudublin;

class StudentFixtures
{
    public function getStudentArray()
    {
        $students = [];

        $matt = new Student();
        $matt->setName('matt murphy');
        $matt->setYear(3);

        $joan = new Student();
        $joan->setName('Joan Jones');
        $joan->setYear(3);


        $fred = new Student();
        $fred->setName('Fred smith');
        $fred->setYear(4);



        $students[] = $matt;
        $students[] = $joan;
        $students[] = $fred;

        return $students;
    }
}