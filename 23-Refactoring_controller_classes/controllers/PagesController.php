<?php
//a controller is receiving a request, it delegates it (example: ask the db for records), and then it is returning a response. PagesController (a controller) controlls the home, about and contact page (which are belong to the view sector). The UsersController controlls the user.view.php page, which is quite dynamic page. 

class PagesController{

	public function home(){

		return view('index'); 
		//the view() function is defined in bootstrap.php, and it has a function to create from this shit: return view('index') this shit here: require 'views/index.view.php'.
		
	}


	public function about(){
		$company = 'Laracasts';
		return view('about', ['company' => $company]);
		//the view() function is defined in bootstrap.php, and it has two functions.
		//The first (mandatory) function is to create from this shit: return view('index') this shit here: return require 'views/index.view.php'.
		//The second (optional) function is if we have a variable in the controller page, and we want to pass that variable too to the view page. Don't forget about the RETURN part of the function. With this return obviously we can return a variable too...Or a key/value pair.
		//Now... here, right now we have only this: ['company' => $company] <---this is not an array (yet), only the first piece of the array!
		//But, the view() function is defined like this on the boostrap.php: function view($name, $data=[]){... <--- so, this is the second piece of the array
		//So, if we add the first piece and the second piece, then we will have this: $data=['company' => $company]; Now we have the complete array!
		//the reason why Jeff is using this idiot solution: ['company' => $company]): because later we will be able to use the extract() built in php function, that will create a variable from an array's key/value pair.
		//extract() will create variable from an assoc array. The assoc. array's key will be the variable name. The array value will the the variable value.See the about.view.php how we used this $company variable. 
		
		
	}


	public function contact(){
		return view('contact');// this is equal to: require 'views/contact.view.php';
	}

}
