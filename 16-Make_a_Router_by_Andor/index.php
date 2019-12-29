<?php

//you can type in for router testing: /about, /contact-our-company, and /about/culture

require "core/bootstrap.php";//whatever that comes back from bootstrap will be saved in the $query. This is possible, because bootstrap.php ends with a return command. Boostrap will be responsible for the 'behind the scenes work'. Boostrap connects to sql (Connection.php) and retrieves info from sql (QueryBuilder.php).

require Router::load('routes.php')// the load() method is defined on the Router.php, and it will load routes.php. routes.php has acces to the define() method. It will activate the define() method. define() method will update the protected $routes property in the Router class. Now, there is a $router in the routes.php, and this will just became part of this new $router here
->direct(Request::uri());//Also, notice that there is no ; at the end of the require Router::load('routes.php'). That is why we can activate the direct() method right after the load() method. This is called chaining.