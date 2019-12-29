<?php
//index.php is the alfa and the omega. Everything starts here.

//you can type in for router testing: /about, contact, home.

require 'vendor/autoload.php';//here we are requiring the composer autoload, that will autoload all the classes
//----THIS PART IS MAINLY FOR THE USER SUBMITTING+DISPLAYING----
require "core/bootstrap.php";//Boostrap will be responsible for the 'behind the scenes work'. 

//-----THIS PART IS MAINLY FOR THE MVC WORK AND ROUTING
Router::load('routes.php')
->direct(Request::uri(), Request::method());
// Router is a class from the Router.php. Router class has a static "object?"" called $router. the load() method is defined on the Router.php, and it will load our routes.
//Also, notice that there is no ; at the end of the require Router::load('routes.php'). That is why we can activate the direct() method right after the load() method. This is called chaining. 
//direct() is a method from the Router class, and it's job is to load the right controller for the righ url.--ITT VAN A GOND, HOGY NEM LÁTOM EZT HOGY HOL TORTÉNIK.
//Request is a class from Request.php. uri() is a static function from Request.php. The uri() provides us the right uri for the controller activation.
//method() is a static function from Request.php. This will give us whether it is a GET or a POST request method. GET is used for routing. POST is used for typing in names, passwords by the user.
