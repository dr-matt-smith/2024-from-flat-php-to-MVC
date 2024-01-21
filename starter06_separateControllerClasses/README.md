# website - version 6 - separation of cncerns

Too many different things were going on in the `Application` class. So the different controller actions have been moved into 2 new controller classes

- the home and about actions are in new class `DefaultControler`
- the show and list actions are in new class `StudentController`

So now the `Application` class only has Front Controller logic - examine the received Request and decide which method of which controller should be invoked.

## Strengths

- each class has clearly defined responsibility
- understandable and maintainable
