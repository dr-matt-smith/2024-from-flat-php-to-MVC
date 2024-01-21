<?php

namespace Tudublin;

class Application
{
    private DefaultController $defaultController;
    private StudentController $studentController;

    public function __construct()
    {
        $this->studentController = new StudentController();
        $this->defaultController = new DefaultController();
    }

    public function handleRequest(): void
    {
        $action = filter_input(INPUT_GET, 'action');

        switch ($action){
            case 'about':
                $this->defaultController->about();
                break;

            case 'show':
                $this->studentController->show();
                break;

            case 'list':
                $this->studentController->list();
                break;

            default:
                $this->defaultController->home();
        }
    }
}