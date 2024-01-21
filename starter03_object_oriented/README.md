# website - version 3 - object-oriented (so we can harness OO features next...)

All `index.php` does now is create an `Application` object and invoke its `run()` method. 

The front-controller logic is now in this class, in folder `/src`.

NOTE: We are using best practice of PSR-4 namespaces, so we declare all our classes in a namespace (I chose `Tudublin`), and we declare that these classes can be found in the `/src` folder in the `composer.json` configuration file.

You'll need to run `composer update` at the command line to generate the class autoloader (Composer will create a new folder `/vendor` containing the autoloader, which we read and execute in teh first line in our index script).



## Strengths

- now OO code, giving us inheritance, encapsulation and so on ...
