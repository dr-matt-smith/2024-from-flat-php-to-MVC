<?php

namespace Tudublin;

use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    #[Route('/', name: 'homepage')]
    public function home(): void
    {
        require_once __DIR__ . '/../templates/home.php';
    }

    #[Route('/about', name: 'about')]
    public function about(): void
    {
        require_once __DIR__ . '/../templates/about.php';
    }

//    #[Route('/matt', name: 'matt')]
//    public function matt(): void
//    {
//        print "<h1>matt woz ere</h1>";
//    }

}