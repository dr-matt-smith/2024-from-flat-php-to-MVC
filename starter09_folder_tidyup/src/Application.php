<?php
namespace Tudublin;

use Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RouteCollection;

use Tudublin\Controller\DefaultController;
use Tudublin\Controller\StudentController;

class Application
{
    private bool $verbose = false;

    private RouteCollection $routes;

    public function __construct()
    {
        // load routes from attributes of controller methods
        $loader = new AttributeRouteControllerLoader();
        $defaultRoutes = $loader->load(DefaultController::class);
        $studentRoutes = $loader->load(StudentController::class);

        $this->routes = new RouteCollection();
        $this->routes->addCollection($defaultRoutes);
        $this->routes->addCollection($studentRoutes);
    }

    public function setVerbose(): void
    {
        $this->verbose = true;
    }

    public function handleRequest(Request $request): void
    {
        // analyse the received REQUEST to the server
        $context = new RequestContext();
        $context->fromRequest($request);

        $this->dumpContents('$context', $context);

        // create URL to route matcher, from routes loaded from attributes of controller methods
        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $attributes = $matcher->match($request->getPathInfo());

            $this->dumpContents('$attributes', $attributes);

            $controllerInfo = explode('::', $attributes['_controller']);
            $this->dumpContents('$controllerInfo', $controllerInfo);

            $controllerObject = new $controllerInfo[0];
            $method = $controllerInfo[1];
            $this->dumpContents('$controllerObject', $controllerObject);
            $this->dumpContents('$attributes', $attributes);

            // get returned response (string) from controller method
            $responseContent = $controllerObject->$method($request);
        } catch (ResourceNotFoundException $exception) {
            $responseContent = 'Sorry Not Found - HTTP code 404';
        } catch (\Exception $exception) {
            $responseContent = 'Sorry server error - HTTP code 500';
        }

        print $responseContent;
    }

    private function dumpContents(string $varname, $data)
    {
        if($this->verbose){

            print $varname . ' = <pre>';
            var_dump($data);
            print '<pre><hr>';
        }
    }

}