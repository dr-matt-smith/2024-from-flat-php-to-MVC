<?php
namespace Tudublin;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


class RouteDeclarations
{
    public function getRoutes(): RouteCollection
    {
        $routes = new RouteCollection();
        $routes->add('homepage', new Route('/', [
            'controller' => ['Tudublin\\DefaultController', 'home']
        ]));
        $routes->add('about', new Route('/about', [
            'controller' => ['Tudublin\\DefaultController', 'about'],
        ]));

        $routes->add('student_show', new Route('/show', [
            'controller' => ['Tudublin\\StudentController', 'show']
        ]));
        $routes->add('student_list', new Route('/list', [
            'controller' => ['Tudublin\\StudentController', 'list'],
        ]));

        return $routes;
    }

}