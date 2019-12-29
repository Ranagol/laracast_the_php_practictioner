<?php

class Connection{//this will connect to the db
	
	public static function make(){//static is a way to make method accesible globally, without instantiation. This STATIC make() method will make connection, when activated.
		
		try {
			return new PDO("mysql:host=127.0.0.1;dbname=mytodo", "root", "");
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}