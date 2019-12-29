<?php

class Post {
	public $title;
	public $author;
	public $published;//this will be a boolean, that is showing if the post has been published

	public function __construct($title, $author, $published){
		$this->title = $title;//left from = is class propterty. Right from = is the future argument. We are assigning the future argument to the class property.

		$this->author = $author;

		$this->published = $published;//left from = is class propterty. Right from = is the future argument.We are assigning the future argument to the class property.
	}
}

$posts = [
	new Post('My first post', 'JW', true),
	new Post('My second post', 'JW', true),
	new Post('My third post', 'AW', true),
	new Post('My fourth post', 'TR', false),
];

//now, imagine that we need to find which one is the unpublished post with array_filter

$unpublishedPosts = array_filter($posts, function ($post){//this will check each post in the array. (That is why we have a $post placeholder in the function)
	return ! $post->published;//please return the $post if the published value is NOT(!) true

});

var_dump($unpublishedPosts);

$publishedPosts = array_filter($posts, function ($post){
	return $post->published;//and here we are filtering for all the posts that are published
});

var_dump($publishedPosts);
//-------------------------------------------------
//the next task: we want to filter through (map) $posts, and change every published value to true with array_map

/*---------------
//The array_map() function sends each value of an array to a user-made function, and returns an array with new values, given by the user-made function. So, it changes the array. Note that this time first goes the function, and after that goes the array. The array_map() function is useful when you need to return a modified content.

$modified = array_map(function($post){//Do this function for every $post...
	return 'foobar';//for every $post return a foobar
}, $posts);//from the $posts array

var_dump($modified);//for every post this will return a foobar
-----------------*/

/*----------------
$modified = array_map(function($post){//Do this function for every $post...
	$post->published = true;//set the published value to true 
	return $post;//and return it
}, $posts);//from the $posts array

var_dump($modified);//will dump 4 arrays, but every one of the will have $published set to true
------------------*/

/*
//the $post item from the $posts array are actually objects. We can use array_map to convert these objects to arrays.
$modified = array_map(function($post){//Do this function for every $post...
	return (array) $post;//make array from object and return it
	
}, $posts);//from the $posts array

var_dump($modified);//will show that now we have 4 arrays instead of 4 objects
*/

//----------------------
/*
//how to get the only the titles from the $posts array with array_map?

$titles = array_map(function ($post){
	return $post->title;
}, $posts);

var_dump($titles);// will dump the titles
-------------------------------------------------------*/
//how to how to get the only the titles from the $posts array with array_column?
//The array_column() function returns the values from a single column in the input array. It can be used with classes and multidimensional arrays too. Array_column() can't access private or public properties, only works with public properties.
/*
$titles = array_column($posts, 'author', 'title');//give me the titles and the author...

var_dump($titles);//will give titles and author
*/


//HOMEWORK

class Task{
	public $description;
	public $completed;

	public function __construct($description, $completed){
		$this->description = $description;
		$this->completed = $completed;
	}
	
}


$taskarray = [
	new Task('wash the car', false),
	new Task('walk the dog', false),
	new Task('read a book', true),
	new Task('just relax', true),
	new Task('remember your dreams', false),
];

//array_filter: find all completed/uncompleted tasks

$unCompletedTasks = array_filter($taskarray, function ($task){
	return ! $task->completed;
});
var_dump($unCompletedTasks);



$completedTasks = array_filter($taskarray, function ($task){
	return $task->completed;
});
var_dump($completedTasks);



//array_map(): change all uncompleted tasks to completed
$allCompleted = array_map(function($task){
	$task->completed = true;
	return $task;
}, $taskarray);

var_dump($allCompleted);








//array_column: use a multi array from w3, and display all first names
$a = array(
  array(
    'id' => 5698,
    'first_name' => 'Peter',
    'last_name' => 'Griffin',
  ),
  array(
    'id' => 4767,
    'first_name' => 'Ben',
    'last_name' => 'Smith',
  ),
  array(
    'id' => 3809,
    'first_name' => 'Joe',
    'last_name' => 'Doe',
  )
);

$firstName = array_column($a, 'first_name');
var_dump($firstName);