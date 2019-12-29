<?php



class Router {
	
	public static function load($file){//static functions can be called without instantiation. This load function will use routs.php as an argumet. 
		
		$router = new static;//Jeffrey: if I want a new instance of a router, I can use this keyword static or self. $router = new static ----this is similar to new Router object instantiation. POSSIBLY HERE WE ARE MAKING A NEW OBJECT?
		
		require $file;//with this, the load() function will load routs.php

		return $router;//...AND POSSIBLY WE ARE RETURNING THIS NEW OBJECT TO THE index.php
	}

	protected $routes = [];//this array will store all the routes info, once the defince() method is activated.

	public function define($routes){

		$this->routes = $routes;//A klasszaban levo routes property egyenlo lesz a azokkal a where/what to route információkkal, amiket majd akkor adunk meg, mikor a define() metodot alkalmazzuk. Ami egyébként a routes.php-nel történik.
	}

	public function direct($uri){//the user types in a url link. If we have a rout that matches that, than we want to load the controller associated with it that. Example: for the example.com/about/culture link we want to load the matching controller: controllers/about-culture.php. 
		

		//about/culture
		if(array_key_exists($uri, $this->routes)){//array_key_exists() returns TRUE if the given key is set in the array. 
			return $this->routes[$uri]; //if the array key exists, we will return a the matching value. Which will be a webpage. In this example that will be the controllers/about-culture.php. So, basically this function returns a webpage.
		}
		throw new Exception('No route defined for this URI.');//Exeption is a class used for displaying errors	
	}
}