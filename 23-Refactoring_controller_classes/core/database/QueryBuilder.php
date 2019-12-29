<?php

class QueryBuilder{//this will fetch the data from the db, this will build up our queries towards the db, and also this will write into the db

	protected $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
		//On the left side of the = $this->pdo is the protected $pdo property. The $pdo on the right side of the = is equal to the placeholder $pdo from the __construct. In the moment of the instatiation, the protected $pdo will be = the used arguments. (Which will look like this: new QueryBuilder(Connection::make());). So $pdo will have all the connection data from the Connection.php
		//...ooor, if we create a new QueryBuilder with the App::get('database') labeling/boxing porcess, then the Connection class and the config.php (with the passwords and connection details) were involved in the previously done bind process.

	}


	public function selectAll($table){//we will insert instead of the $table our tablename in the database -- for the todolist project
		
		$statement = $this->pdo->prepare("select * from {$table}");//The prepare() is a built in method, it will create a PDO statement (PDO Statement is a class too). We are saying: prepare everything from todos database.  

		$statement->execute();//please execute the $statement from above.

		return $statement->fetchAll(PDO::FETCH_CLASS);//fetchAll returns an array containing all of the result set rows. PDO::FETCH_CLASS: Returns instances of the specified class, mapping the columns of each row to named properties in the class.
	}


	public function insert($table, $parameters){
		//Jeff's note: our query for inserting the users name into the users table would look something like this: insert into names (name) values (:name). Now the name and the value will be a placeholder, because we will use prepared statements, which will give us a lot of security and protection. The : is showing us than this is just a placeholder. So, the : is important.
		//sprintf()-it allows us to declare a string with placeholders for what we can attach variables or values. Placeholders will be the %s in this case. 
		// now the $parameter looks like this: ['name' => $_POST['name']. Source: UserControllers.php.
		

		$sql = sprintf(
			'insert into %s (%s) values (%s)',//This "insert into..." text is a command for the db. Note we have 3 %s placeholders in this command. These will be replaced with %s values.
			
			$table,//first value for the %s. This is actually the first argument for this insert() method. This is the easy part.
			
			implode(', ', array_keys($parameters)),//implode only the key parameters, and separate them by comma. This is the second value for the %s
			//array_keys()-returns all the keys from an array
			//The implode() function returns a string from the elements of an array. These elements will be glued together.

			
			':' . implode(', :',array_keys($parameters))//This is the third value for the %s. We do have the keyes, but we need the : before them (:names). This part-- (', :', --- will produce : for the possible 2., 3., 4.... item, but not for the first item. This-- ':'-- is producing the : for the first item.
		);

		try {
			$statement = $this->pdo->prepare($sql);//please prepare this...
			$statement ->execute($parameters);//please execute this...
		} catch (Exception $e) {//do this if there is a problem with the inserting into db
			die('Whoops, something went wrong.');
		}

	}
	
}