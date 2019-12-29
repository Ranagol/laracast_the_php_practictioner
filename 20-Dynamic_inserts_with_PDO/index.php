<?php

//you can type in for router testing: /about,  and /about/culture. But THE contact page have been disabled by Jeff for unknown reasons.

require "core/bootstrap.php";//whatever that comes back from bootstrap will be saved in the $query. This is possible, because bootstrap.php ends with a return command. Boostrap will be responsible for the 'behind the scenes work'. Boostrap connects to sql (Connection.php) and retrieves info from sql (QueryBuilder.php).

require Router::load('routes.php')// Router is a class from the Router.php. Router class has a static "object?"" called $router. the load() method is defined on the Router.php, and it will load routes.
->direct(Request::uri(), Request::method());//Also, notice that there is no ; at the end of the require Router::load('routes.php'). That is why we can activate the direct() method right after the load() method. This is called chaining. 
//direct() is a method from the Router class, and it's job is to load the right controller(example: controllers/about-culture.php.) page for the righ url.--ITT VAN A GOND, HOGY NEM LÁTOM EZT HOGY HOL TORTÉNIK.
//Request is a class from Request.php. uri() is a static function from Request.php. 
//uri()is a method from class Request, from Request.php. uri() is giving us the uri from the browser, what was typed in by the user. Example: the users name.
//method() is a static function from Request.php. This will give us whether it is a GET or a POST request method. GET is used for routing. POST is used for typing in names, passwords by the user.
