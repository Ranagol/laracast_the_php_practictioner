<?php

class QueryBuilder{//this will fetch the data from the db, this will build up our queries towards the db

	protected $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;//On the left side of the = $this->pdo is the protected $pdo property. The $pdo on the right side of the = is equal to the placeholder $pdo from the __construct. In the moment of the instatiation, the protected $pdo will be = the used arguments. (Which will look like this: new QueryBuilder(Connection::make());). So $pdo will have all the connection data from the Connection.php
	}

	public function selectAll($table){//we will insert instead of the $table our tablename in the database
		
		$statement = $this->pdo->prepare("select * from {$table}");//The prepare() is a built in method, it will create a PDO statement (PDO Statement is a class too). We are saying: prepare everything from todos database.  

		$statement->execute();//please execute the $statement from above.

		return $statement->fetchAll(PDO::FETCH_CLASS);//fetchAll returns an array containing all of the result set rows. PDO::FETCH_CLASS: Returns instances of the specified class, mapping the columns of each row to named properties in the class.
	}
	
}