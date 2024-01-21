<?php

namespace Tudublin\Controller;

use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    const TEMPLATE_HOME = __DIR__ . '/../../templates';

    #[Route('/', name: 'homepage')]
    public function home(): void
    {
        require_once self::TEMPLATE_HOME . '/default/home.php';
    }

    #[Route('/about', name: 'about')]
    public function about(): void
    {
        require_once self::TEMPLATE_HOME . '/default//about.php';
    }
}