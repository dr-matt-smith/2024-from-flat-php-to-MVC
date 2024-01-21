<?php

namespace Tudublin;

class Application
{
    public function handleRequest(): void
    {
        $action = filter_input(INPUT_GET, 'action');

        switch ($action){
            case 'about':
                require_once __DIR__ . '/../templates/about.php';
                break;

            default:
                require_once __DIR__ . '/../templates/home.php';
        }
    }

}