<?php

//The db name is mytodo. The table name is todos. Here we are creating a db based todo list.

require "functions.php";
require "Task.php";

$pdo = connectToDb();//Here we activated a simple function from functions.php. This is how we can connect to db. The way how we connect to the db, the connection details... all is here. And all is saved in the $pdo variable.

$tasks = fetchAllTasks($pdo);//The fetchAllTasks is a function from the functions.php, and it is fetching, retriving data from the db. It uses $pdo as an argument, so it has all the connection details. Whatever was fetched, it is now stored in the $tasks. fetchAllTasks produces an array. The index.view.php will work with the $tasks.


require 'index.view.php';
