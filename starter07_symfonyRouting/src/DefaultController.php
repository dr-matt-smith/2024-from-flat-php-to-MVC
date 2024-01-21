<?php

namespace Tudublin;

class DefaultController
{
    public function home(): void
    {
        require_once __DIR__ . '/../templates/home.php';
    }

    public function about(): void
    {
        require_once __DIR__ . '/../templates/about.php';
    }
}