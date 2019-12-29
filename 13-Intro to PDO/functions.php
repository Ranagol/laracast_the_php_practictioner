<?php
//The db name is mytodo. The table name is todos.
function connectToDb(){
	try {//try to connect to the db

		return new PDO("mysql:host=127.0.0.1;dbname=mytodo", "root", "");//1-we use mysql. 2-we use localhost, which is always 127.0.0.1. 3-this is the database name. 4-the username is root. 5-and there is no password, so we just leave "" it empty.AAAAND, here we created a new PDO object.
		
		echo "Success, PDO is connected to the database";

	} catch (PDOException $e) {//...but catch any kind of exceptional scenario (aka error), example: we could not connect, there was no mysql installed. PDOException $e is a specific type of an exception. The "catch" block retrieves the exception and creates an object ($e) containing the exception information. So, if we can't connect (so, there is an exception), than...
		
		die($e->getMessage());//..and die + get a message what went wrong
	}
}

function fetchAllTasks($pdo){//the $pdo here is just a placeholder here. When we activate this method, we will add in the $pdo as an argument, and this is happening on the index.php
	//now that we are connected to the database, we want to fetch data from the db

	$statement = $pdo->prepare("select * from todos");//The prepare() is a built in method, it will create a PDO statement (PDO Statement is a class too). We are saying: prepare everything from todos database. 

	$statement->execute();//please execute the $statement from above.
	

	//------------------------------------------------------
	return $statement->fetchAll(PDO::FETCH_CLASS, "Task");//fetchAll returns an array containing all of the result set rows. PDO::FETCH_CLASS: Returns instances of the specified class, mapping the columns of each row to named properties in the class.
	//The teacher said in the tutorial: Now we work with classes. Now each of the tasks from this array can call any (example: the foobar dummy method) method or behaviour from the Task.php. 
	//OK, ezt a részt nem értem, hogy mi történt. Hogy kapcsolódik ide a Task.php, és a Task Class? Minek? Meg jól értettem a kapott infó valahogy át van alakítva klasszává, vagy propertivé? Nem array van itt csinálva?
	//-----------------------------------------------------
}

function dd($data) {
	echo "<pre>";
	die(var_dump($data));
	echo "</pre>";
}