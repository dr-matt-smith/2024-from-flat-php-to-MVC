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
                $student = new Student();
                $student->setName('Matt Smith');
                $student->setYear(4);
                require_once __DIR__ . '/../templates/show.php';
                break;

            default:
                require_once __DIR__ . '/../templates/home.php';
        }
    }

}