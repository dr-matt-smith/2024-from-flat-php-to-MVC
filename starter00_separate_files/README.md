# website - version 0 - separate, public PHP scripts

The OLD way of doing things

- several PHP scripts, in the publicly served folder
- to view a page you need to enter script name at end of URL, etc. `locahost:8000/about.php`

## To run

Run with the Symfony server: `symfony serve`

Visit pages at: `https://127.0.0.1:8000/`

## Strengths

- Simplest !
- Fastest !

## Weaknesses

Everything else!

- security (all scripts in public folder)
- maintainability - 10s or 100s of scripts - becomes spagetti
- duplication - see how little is different between the HTML of each file
- lack of standards - who knows WHERE any session / DB code / security code might be - every website could be implemented differently ...


## Acknowledgements

Inspired by the sequence in the introduction to Symfony documetnation at:
- [https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html](https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html)
