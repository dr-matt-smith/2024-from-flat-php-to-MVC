<?php
namespace Tudublin;

use Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RouteCollection;

class Application
{
    // string path to directory containing your controller classes
    // usually "/src" or "/src/Controllers"
    const CONTROLLER_DIRECTORY = __DIR__;

    private RouteCollection $routes;

    public function __construct()
    {
        // load routes from classes: DefaultController and StudentController
        //
        // TODO - search ALL classes with prvix "Controller" in folder "src" and add their routes to $this->routes
        $loader = new AttributeRouteControllerLoader();
        $defaultRoutes = $loader->load(DefaultController::class);
        $studentRoutes = $loader->load(StudentController::class);

        $this->routes = new RouteCollection();
        $this->routes->addCollection($defaultRoutes);
        $this->routes->addCollection($studentRoutes);



        // load routes from attributes of controller methods
//        $loader = new AnnotationDirectoryLoader(new FileLocator(), new AnnotatedRouteControllerLoader());
//        $this->routes = $loader->load(self::CONTROLLER_DIRECTORY);


//
//        $loader = new AnnotationDirectoryLoader(
//            new FileLocator(),
//            new class() extends AnnotationClassLoader {
//                protected function configureRoute(Route $route, \ReflectionClass $class, \ReflectionMethod $method, object $annot) {
//                    $route->setDefault('_controller', $class->getName() . '::' . $method->getName());
//                }
//            }
//        );
//
//        $routes = $loader->load(__DIR__ . '/../src/App/Controller');

//        $loader = new DelegatingLoader(
//            new LoaderResolver([
//                new Psr4DirectoryLoader(
//                    new FileLocator()
//                ),
//                new class() extends AnnotationClassLoader {
//                    protected function configureRoute(Route $route, \ReflectionClass $class, \ReflectionMethod $method, object $annot) {
//                        $route->setDefault('_controller', $class->getName() . '::' . $method->getName());
//                    }
//                }
//            ])
//        );
//
//        $routes = $loader->load(['path' => __DIR__ . '/../src/App/Controller', 'namespace' => 'App\Controller'], 'attribute');
    }

    public function handleRequest(Request $request): void
    {
        // analyse the received REQUEST to the server
        $context = new RequestContext();
        $context->fromRequest($request);

        // create URL to route matcher, from routes loaded from attributes of controller methods
        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $attributes = $matcher->match($request->getPathInfo());
            $controllerInfo = explode('::', $attributes['_controller']);

            $controllerObject = new $controllerInfo[0];
            $method = $controllerInfo[1];

            // get returned response (string) from controller method
            $responseContent = $controllerObject->$method($request);
        } catch (ResourceNotFoundException $exception) {
            $responseContent = 'Sorry Not Found - HTTP code 404';
        } catch (\Exception $exception) {
            $responseContent = 'Sorry server error - HTTP code 500';
        }

        print $responseContent;
    }
}