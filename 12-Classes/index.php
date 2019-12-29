<?php

require "functions.php";//this function right now is not needed, but it is here nevertheless...

class Task {
//we decided that every new Task will have a description, and a completed value. If completed=true. If not completed=false. 

	public $description;//here we created a property, for the class

	public $completed = false;//when created, every new Task is uncompleted, right? So, here by default we make every new task wiht a false $completed value. Later, this will be completed (aka true).

	public function __construct($description){//construct this $desciption property for the newly created object. The __construct will be triggered any time when a new Task is initialized. This function accepts one argument, which will be the description.

		$this->description = $description;//Whatever the user writes as an argument, that will be the desription of the newly created Task
	}

	public function complete(){//this function will make a $task "completed", aka will make the tasks $completed variable true
		
		$this->completed = true;
	}

	public function isComplete(){//this function will figure out if Task is complete. 

		return $this->completed;
	}

}
/*THIS BELOW IS COMPLETELY WORKING, IT IS OK!
$task = new Task("Go to the store");//this is an instantiation, we are creating a new object here. This new object (new Task) is saved in $task variable.

$task->complete();//here with this function we want to set the $task to be completed (the $completed to be true)

var_dump($task->isComplete());//here we checking if the (new) $task is completed
*/

//below we are creating 3 new Task objects in an array

$tasks = [
	new Task("Go to the store"),
	new Task("Understand Laracast shitty explanation"),
	new Task("Clean my room")
];

$tasks[0]->complete();//here we make "Go to the store" (which has index number 0 in the array) completed

require "index.view.php";