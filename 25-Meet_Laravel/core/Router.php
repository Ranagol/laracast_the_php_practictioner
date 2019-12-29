<?php

namespace App\Core;

class Router {
	
	public $routes = [//this array will store all the routes info, once the define() method is activated. Jeff: and we will be explicit here whether this will be a get or post route.

		'GET' =>[],//this is a key/value pair. The key is the GET, and the value is empty at this moment.
		//after when the get() function is activated by routes.php, the 'GET' key will receive a value, the $uri. Example for $uri: about.
		'POST' =>[]//this is a key/value pair. The key is the POST, and the value is empty at this moment.
	];


	public static function load($file){//static functions can be called without instantiation. This load function will use routes.php as an argumet. And if this load() method is called, then a static $router is created too. $router will have an important role in the routes.php.
		
		$router = new static;//Jeffrey: if I want a new instance of a router, I can use this keyword static or self. $router = new static ----this is similar to new Router object instantiation. But we don't need the instantiation itself.
		
		require $file;//with this, the load() function will load routs.php

		return $router;//...AND POSSIBLY WE ARE RETURNING THIS NEW OBJECT TO THE index.php
	}


	public function get($uri, $controller){//this function will be used in the routes.php. Example for the $uri: users (because the action in the submit form is set to 'users', so it will generate a users uri. Example for $controller: PagesController@home. So, we receive the $uri from the routes.php

		$this->routes['GET'][$uri] = $controller;
		//WTF????? POSSIBLE SOLUTION: now the $controller is also in the $routes array property??
	}


	public function post($uri, $controller){//this function will be used in the routes.php. The $controller here is just a placeholder for the right  CONTROLLER CLASSES! So, example for $controller: PagesController@home.
		$this->routes['POST'][$uri] = $controller;//Aaand we will do another one with a post request.
	}


	//Jeff: direct() is the place where we direct the traffic
	public function direct($uri, $requestType){//here the $requestType for now is just a placeholder.
	//the arguments $uri (example: about) and $requestType (example: get) will be provided by the Request.php on the index.php
	
		if(array_key_exists($uri, $this->routes[$requestType])){
		//... in this part--- $this->routes[$requestType]--- we are probably assigning the $requestType argument to become 
		//Do we have a $uri? THE $URI IS NOT A KEY, IT IS AN ARGUMENT...? WTF?
		//array_key_exists() returns TRUE if the given key is set in the array. The form is: array_key_exists(key-what we search for,array-where we search for it) 
		//NOW WHERE THE FUCK ARE WE SEARCHING FOR? Possibly in the $routes property? WTF are we searching for? Possibly for the $uri? 
		//The requestType will give us the POST or GET. GET is used for routing. POST is used for typing in names, passwords by the user.
		//FOR THE TIME BEING LETS IGNORE THIS SHITTY CHECK 


			return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
			//callAction is defined after this direct() method
			//explode() turns this string into an array. Example how explode() works: Array ( [0] => Hello [1] => world. [2] => It's [3] => a [4] => beautiful [5] => day. )
			//then we want to turn that array to be an arguments for the callAction() method
			//And for that we need the splat operator (which is this: ...). The '...' part is called splat operator. It allows us to use undefined number of arguments with the callAction method. With the splat operator we can use 1 argument, 2 arguments... Doesn't matter.
			// In the end what this Router does: it returns a $controller (PagesController or UsersController) and an action (example: home(), about(), contact() from the PagesController)
		}
		throw new Exception('No route defined for this URI.');//Exeption is a class used for displaying errors	
	}



	protected function callAction($controller, $action){//$action could be home(), about() or contact()... from PagesController
	
		$controller = "App\\Controllers\\{$controller}";// Here we are possibly declaring the class with the namespace tehchnique? We are using \\ to escape the {} around the $controller

		$controller = new $controller;//all the contollers now are classes/methods, that are in PagesController or UsersController. That is why we are creating here a new controller object.

		if (! method_exists($controller, $action)) {//$controller is either PagesController or UsersController. The $action is the actual method that we search for. This method could be: home(), about(), contact()...
			throw new Exception("{$controller} does not respond to the {$action} action.");//WHY IS THIS SHIT IN CURLY BRACES? WHY CAN'T WE LEAVE OUT THE CURLY BRACES?
			
		}
		return $controller->$action();////$controller is either PagesController or UsersController. The $action is the actual method that we search for. This method could be: home(), about(), contact()...
		//In the end what this Router does: it returns a $controller (PagesController or UsersController) and an action (example: home(), about(), contact() from the PagesController)
	}
}