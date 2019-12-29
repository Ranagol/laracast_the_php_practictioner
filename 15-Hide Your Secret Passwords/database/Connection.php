<?php

class Connection{//this will connect to the db
	
	public static function make($config){//static is a way to make method accesible globally, without instantiation. This STATIC make() method will make connection, when activated. And for this, it will the config.php as an argument. Config.php stores our sensitive passwords securely from the users.
		
		try {
			return new PDO(
				$config['connection'] . ';dbname=' . $config['name'],
				$config['username'],
				$config['password'],
				$config['options']
			);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}