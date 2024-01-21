# website - version 5 - list of objects

Added a class `StudentFixtures.php` which returns an array of `Student` objects, and a new page to loop through the array and list the objects

So request `/?action=list` will result in template `/templates/list.php` being displayed.

NOTE: Since more logic to prepare student for show page and array of students for list, actions for each page have been put into their own methods. So class `Application` now has methods:

- `run()`
- `home()`
- `about()`
- `show()`
- `list()`

## Strengths

- template that loops through an array
- initial test data (fixtures) declared in a class
