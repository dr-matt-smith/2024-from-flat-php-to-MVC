# website - version 2 - every request goes through Front Controller `index.php`

Now only a single script in `/public` which is the Front Controller `index.php`

Links to different pages are in the form:
- `/`: no value for variable `action` for the default home page
- `/?action=about`: no value for variable `action` for the default home page

NOTE: `/?action=about` is the same a `/index.php?action=about`, for PHP-aware web server, if no script is specified then the server will execute `/index.php` (if it can be found)

## Strengths

- much more scalable - easy to see how to add new pages (add new template, and add new case in `switch`-statement)
- now a SINGLE LOCATION for things like managing sessions, doing security authorization checks and so on ...
