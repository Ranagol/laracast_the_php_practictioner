<?php

//a controller is receiving a request, it delegates it (example: ask the db for records), and then it is returning a response. PagesController (a controller) controlls the home, about and contact page (which are belong to the view sector). The UsersController controlls the user.view.php page, which is quite dynamic page. 

namespace App\Controllers;//here we namespaced the UsersCotroller class. But, on this page, we have an another class used. That is the App class. PHP will serc for the App class too in the App\Controllers by default. And of course, won't find it. The App class is namespaced App\core, because the App.php is in the core folder. Solution: for the App class in this file we must write:

use App\core\App;//this is only for the App class



class UsersController {

	public function index(){//THIS IS FOR READING FROM THE DB

		$users = App::get('database')->selectAll('users');//we save the result of our fetching info query to $users. This is possible, becuase the selectAll has a return command in the end. $users will be used in the users.view.php to diplay the data with a foreach loop. 
		//Basically, here we activate the QueryBuilder, to fetch users from the users table. 
		//App is a class from App.php. get() is a static method from the App class, ment to activate what is under the 'database' label. Under 'database label' is a creation of a new QueryBuilder object. Source for this creation is on the bootstrap.php.
		//So we are creating a new QueryBuilder. But. The trick is in the previous bind proces for the get('database'), where the Connection.php (how to connect) and the config.php (what is the passwor, address, root...) was also involved. This is why we can now connect to the db with only 2-3 words...
		//selectAll is a method from the QueryBuilder.php, it fetches data from db. Our table name in our db is users. 
		
		return view('users', compact('users'));
		//the view() function is defined in bootstrap.php, and it has two functions.
		//The first (mandatory) function is to create from this shit: return view('index') this shit here: return require 'views/index.view.php'.
		//The second (optional) function is if we have a variable in the controller page, and we want to pass that variable too to the view page. For example see the about() controller and the related about.view.php.

		//Now we have a problem. The view()  doesn't know about the $users, and beause of that, the foreach looping on the users.view.php won't work. To solve this, we must include the $users as a second argument for the view() function, to be returned too. We will use the before mentioned second (optional) function for this.
		//It is possible, that the users list receoved from the db is not an array, becuse of the fetchAll(PDO::FETCH_CLASS) setting. To create an array from the received users list, we must use the compact() built in function.
		// compact() is a built in function. It can create associative array from variables. The variable name will be the key. The variable value will be the array value. Possibly this way we created here key/value pairs from the users name?
		//If the second argument for the view() is an array key/value pair, this function will add his $data=[] part, and that way an assoc. array will be created. For this, we will use the extract() function.
		//The view() function has a built in extract() function. See the boostrap if you want to check this. extract() will create variable from an assoc array. The key will be the variable name. The array value will the the variable value. That is it converts array keys into variable names and array values into variable value. Input : array("a" => "one", "b" => "two", "c" => "three"). Output :$a = "one" , $b = "two" , $c = "three".
		//So this is the way how we can forward our users list from here, the controller page to the view page.
		//IT IS A FOGGY, SHITTY, OVERCOMPLICATED WAY

	}


	public function store(){//THIS IS FOR WRITING TO THE DB

		//the function of this file will be to add user name to the db
			
		App::get('database')->insert('users',[

			'name' => $_POST['name'],//...which was received from the forms, and was stored in the $_POST superglobal.
			//App is a class from App.php. get() is a static method from the App class, ment to activate what is under the 'database' label. Under 'database label' is a creation of a new QueryBuilder object. Source for this creation is on the bootstrap.php. 
			//So we are creating a new QueryBuilder. But. The trick is in the previous bind proces for the get('database'), where the Connection.php (how to connect) and the config.php (what is the passwor, address, root...) was also involved. This is why we can now connect to the db with only 2-3 words...
			//insert() is a method from the QueryBuilder. users is our db table name where we want to insert the received user name...
		]);


		return redirect('users');//redirect() is a function from bootstrap.php. The 'users' argument here is actually a path where to redirect. Path=uri. So, here we want to redirect to the /users uri.
	}


}