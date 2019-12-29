<?php
//boostrap will be responsible for the 'behind the scenes work (connecting to the db, and fetching data from the db)'
//"Dependency injection Container" sounds like a super scary thing. But it's easy to understand! Think of them as boxes. Apply a label, and throw your stuff into the box. When you need them back, simply look for the corresponding label!


App::bind('config', require 'config.php');// this is the box----require 'config.php'. And the 'config' is the label. The App is a class from App.php. bind() is a method from App class. Bind means: kosd ossze, osszekotni.
//App is a class from App.php. bind() is a static method from App class. In the future, if we use the 'config' label, we will requiring the config.php.



// we are making a connection here and creating a query for the db.
App::bind('database', new QueryBuilder(//we are activating the bind() method from the App class.When the 'database' label is used, create a new Query builder object)...The QueryBuilder will need a $pdo as an argument to make a connection with the db. For that, the QueryBuilder will need all the details that is in the config.php (which will be activated with the get method from the App class like this: get('config')). In the future, if we use the 'database' label, we will create a new QueryBuilder object. NOTE THAT IN THIS LINE, HERE WE ARE NOT CREATING A NEW QueryBuilder object!!

	Connection::make(App::get('config')['database'])//The  static make() method from the Connection class knows how to use the necesary connection data (username, password, dbname...) but it needs acces to it, it need a $config argument, which will give him acces to this necesary data.
	));//App::get('config') is requiring the config.php, so now we have acces to all the necesary connection data. The get() is a static method from App class.
	//
	//HERE we are creating a new QueryBuilder object from the QueryBuilder.php, which is using the Connection class and the make() method from the Connection.php.  
	//OK, I DON'T QUITE UNDERSTAND THIS PART, BUT FOR TIME BEING, JUST LEAVE IT...----------('config')['database'])



function view($name, $data=[]){//with this function, sometimes we will have one argument, sometimes we will have two arguments. As a solution, instead of $data we will put $data=[]. It is an array, it is empty, but if it necesary, we can add into this array anytime.

	extract($data);//if the $data=is empty, there is nothing to extract...
	return require "views/{$name}.view.php";
}
//the view() function is defined in bootstrap.php, and it has two functions.
//The first (mandatory) function is to create from this shit: return view('index') this shit here: return require 'views/index.view.php'.
//The second (optional) function is if we have a variable in the controller page, and we want to pass that variable too to the view page. For example see the about() controller and the related about.view.php.
//If the second argument for the view() is an array key/value pair, this function will add his $data=[] part, and that way an assoc. array will be created. For this, we will use the extract() function.
//extract() will create variable from an assoc array. The key will be the variable name. The array value will the the variable value. That is it converts array keys into variable names and array values into variable value. Input : array("a" => "one", "b" => "two", "c" => "three"). Output :$a = "one" , $b = "two" , $c = "three".
//notice that this is a function, not a method! 
//Don't forget about the RETURN part of the function.




function redirect($path){

	header("Location: /{$path}");
}
/*
	// And then redirect back to all users. Jeff: in php we can redirect by setting a header

	header("Location: /users");//with this redirecting we will be able to set the users name on our webpage (while the name is being sent to the db). The second special case is the "Location:" header. It sends this header back to the browser.
	//The header() function sends a raw HTTP header to a client. So, header will send ' /' to the browser. This will lead us to controllers/index.php, which will lead us to index.view.php (the main home page), where we will be able to see displayed the newly inserted name.

*/