# 2024-from-flat-php-to-MVC
A sequence from old-fashioned multiple PHP scripts per page to OO MVC approach to attribute-declared routes

We'll start off with 2 PHP files, both in `/public`:

```bash
    /public
      about.php
      index.php
```

and end up with template-based, scalable OO architure, where URL routes are automatically detected through OO refleciotn from classes like this:

```php
    <?php
    // FILE: /src/Controller/DefaultController.php
    
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
```

