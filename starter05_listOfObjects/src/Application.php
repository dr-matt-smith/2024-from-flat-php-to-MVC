<?php

namespace Tudublin;

class Application
{
    public function handleRequest()
    {
        $action = filter_input(INPUT_GET, 'action');

        switch ($action){
            case 'about':
                require_once __DIR__ . '/../templates/about.php';
                break;

            case 'show':
                $this->show();
                break;

            case 'list':
                $this->list();
                break;

            default:
                $this->home();
        }
    }

    public function home()
    {
        require_once __DIR__ . '/../templates/home.php';
    }



    public function about()
    {
        require_once __DIR__ . '/../templates/about.php';
    }


    public function show()
    {
        $student = new Student();
        $student->setName('Matt Smith');
        $student->setYear(4);
        require_once __DIR__ . '/../templates/show.php';
    }


    public function list()
    {
        $studentFixtures = new StudentFixtures();
        $students = $studentFixtures->getStudentArray();
        require_once __DIR__ . '/../templates/list.php';
    }
}