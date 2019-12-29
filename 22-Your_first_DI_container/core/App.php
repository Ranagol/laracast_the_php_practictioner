<?php
//this will have the dependancy injection container
//"Dependency injection Container" sounds like a super scary thing. But it's easy to understand! Think of them as boxes. Apply a label, and throw your stuff into the box. When you need them back, simply look for the corresponding label!
//there are two bind() methods on the bootstrap.php


class App {

	protected static $registry = [];//Jeff: each time when we bind into our app container, we will just store it in this $registry array. This $registry has to be static, only that way the static functions will have access to it.


	public static function bind($key, $value){
		
		static::$registry[$key] = $value;//put the $key to the $registry array. Put the $value into the $registry. Make them a key/value pair. So this function is binding the $key and the $value, and putting it to the $registry array.
	
	}


	public static function get($key){
		if (! array_key_exists($key, static::$registry)) {//first we need to check if the $registry contains the array key, aka was the $key put into the $registry array by the bind() method. (actually we are checking if the key doesn't exist with the !)
			throw new Exception('No {$key} is bound in the container.');//if there is no key in the $registry array, then give us this error message...
		}

		return static::$registry[$key];//... if the $key is there in the $registry, then return it's value, so we can use it...
	}

}