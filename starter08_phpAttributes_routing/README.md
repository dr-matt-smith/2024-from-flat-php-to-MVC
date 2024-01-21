# website - version 8 - routes inferred from ATTRIBUTES before each controller method

We can remove class `RouteDeclarations` and instead write a PHP **attribute** before each controller method.

We can add code in our `Application` class to automatically read through all the attributes of controller classes, to create a routes array...

We have done the following:

- removed class `RouteDeclarations`

- added some constructor logic in class `Application` to automatically read through all the attributes of controller classes, to create a routes array

- added the route name and URL pattern as attributes for each controller method. For example, here a route named `homepage` is declared for the `home()` method of class `DefaultController` through an attribute:

```php
    class DefaultController
    {
        const TEMPLATE_HOME = __DIR__ . '/../../templates';
    
        #[Route('/', name: 'homepage')]
        public function home(): void
        {
            require_once self::TEMPLATE_HOME . '/default/home.php';
        }
```

## Strengths

- tidier !
- closer to the Symfony project structure :-)
