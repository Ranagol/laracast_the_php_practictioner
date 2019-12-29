<?php
//the routes page contains routes. Which uri (example: about) to connect to which controller (example:PagesController@about). In case of PagesController@about, the PagesController part is indicating to us that he is on the PagesController.php page, and the @about part is indicating to us that the about() method will be responsible to controll it.
//GET is used for routing. POST is used for typing in names, passwords by the user.


//router is new static object from the Router.php
$router->get('','PagesController@home');//the get() method is defined in Router.php. $router is something similar like a new object from the Router class. But it is static, so it doesn't have to be instantiated.
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

$router->get('users', 'UsersController@index');//for the 'users' uri, please get us to the index function in the UsersController Class, which is all in the UsersController.php. This index will be responsible for displaying or rendering all our users, and it WON'T BE USED FOR THE submitting process!

//these routes above are the MVC shit possibly with the GET method and routing...

$router->post('users', 'UsersController@store');//Jeff: it is a common convention that this is called store. This store() is a method from the UsersController. The post method is from Router.php
//So, our user submitted his name. The uri changed to users. This router here is calling in the UsersController@store. 