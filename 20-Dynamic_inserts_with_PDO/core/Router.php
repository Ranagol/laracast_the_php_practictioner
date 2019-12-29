<?php

class Router {
	
	public $routes = [//this array will store all the routes info, once the define() method is activated. Jeff: and we will be explicit here whether this will be a get or post route.

		'GET' =>[],//this is a key/value pair. The key is the GET, and the value is empty at this moment.
		'POST' =>[]//this is a key/value pair. The key is the POST, and the value is empty at this moment.
	];


	public static function load($file){//static functions can be called without instantiation. This load function will use routs.php as an argumet. And if this load() method is called, then a static $router is created too. $router will have an important role in the routes.php.
		
		$router = new static;//Jeffrey: if I want a new instance of a router, I can use this keyword static or self. $router = new static ----this is similar to new Router object instantiation. But we don't need the instantiation itself.
		
		require $file;//with this, the load() function will load routs.php

		return $router;//...AND POSSIBLY WE ARE RETURNING THIS NEW OBJECT TO THE index.php
	}


	public function get($uri, $controller){//this function will be used in the routes.php. The $controller here is just a placeholder for the right controller page (example. controllers/about-culture.php)
		$this->routes['GET'][$uri] = $controller;//this part here: ['GET'][$uri]---we are adding to the $routes property (in this class) array a new key/value pair, where the ['GET'] is already the key, and [$uri] will be the value. And after that, finally we are making the $uri = to the $controller. Posible example: the 'about' uri will become 'controllers/about.php'? So, our app at this point has 3 info's: example: the user typed 'about', this is a GET method, and there is this page 'controllers/about.php';
	}


	public function post($uri, $controller){//this function will be used in the routes.php. The $controller here is just a placeholder for the right controller page (example. controllers/about-culture.php)
		$this->routes['POST'][$uri] = $controller;//Aaand we will do another one with a post request.
	}


	public function direct($uri, $requestType){//the user types in a url link. If we have a rout that matches that, than we want to load the controller associated with it that. Example: for the example.com/about/culture link we want to load the matching controller: controllers/about-culture.php. The direct() method will be used on the index.php. The $requestType here is just a placeholder, and when the direct() method will be activated, the $requestType will be Request::method(). The $requestType or the Request::method() will give us if this is a post or get method.
		
		if(array_key_exists($uri, $this->routes[$requestType])){//array_key_exists() returns TRUE if the given key is set in the array. 
			
			return $this->routes[$requestType][$uri]; //if the array key exists, we will return the matching value. Which will be a webpage. In this example that will be the controllers/about-culture.php. So, basically this function returns a webpage. The requestType will give us the POST or GET. GET is used for routing. POST is used for typing in names, passwords by the user.
		}
		throw new Exception('No route defined for this URI.');//Exeption is a class used for displaying errors	
	}
}