# website - version 7 - use Symfony routing system

Symfony maintains a stand-alone routing library. So let's make use of that, rather than writing our own.

You'll see 4 new project dependencies in the `composer.json` file. You may have to run `composer udpate` to populate the `/vendor` folder for this project.

We can change the navigation links to no longer require the `action` variable. So our page URLs in the comon `/templates/_nav.php` will be:

- `/`: for the home page
- `/about`: for the about page
- `/show`: for the show one student page
- `/list`: for the list array of students page

We declare the URLs about as Symfony `Route` objects in class `RouteDeclarations`. This class declares a method `getRoutes()` which returns routes, associating the URL patterns above with the appropriate controller class and method name for each route. A name is also declared for each route (which can be used to generate links in a framework for a given route). 

For example, this is the code to declare a new route named `student_show`, which associates Request URL pattern `/show` with method `show` of class `Tudublin\\StudentController`:

```php
        $routes->add('student_show', new Route('/show', [
            'controller' => ['Tudublin\\StudentController', 'home']
        ]));
```

We have changed the content of our `/public/index.php` to now pass to the `handleRequest(...)` method a `Request` object, created from the Symfony HTTP foundation classes.

The `handleRequest(...)` method gets the routes from an instance of class `RouteDeclarations`, and then attempts to match the contents of the received HTTP Request with the array of routes that has been declared. If a match is found, then the method of the appropriate controller class will be invoked, to create the content for the HTTP Response to be returned to the client. Otherwise, (if no match was found), then a 404 not found error is returned instead.

Don't worry too much about the contents of the `handleRequest(...)` method of class `Application` - the whole point is that this code will never change. For each project we just have to declare our templates, our controller classes and methods, and declare the routes to match Request URL patterns to our controller methods...


NOTE: In `/public/index.php` if you the `setVerbose()` method of the `Application` object, before calling `handleRequest(...)`, then you'll see how the contents of the Request are evaluated, and how the route matching is performed...

## Strengths

- Simple !
- Fast !
- logic (code!) separated from the HTML content being returned to the client/user
- much more scalable - easy to see how to add new pages (add new template, and add new case in `switch`-statement)
- now a SINGLE LOCATION for things like managing sessions, doing security authorization checks and so on ...
- now OO code, giving us inheritance, encapsulation and so on ...
- passing DATA to a template .... re-use of template with different data ...
- template that loops through an array
- initial test data (fixtures) declared in a class
