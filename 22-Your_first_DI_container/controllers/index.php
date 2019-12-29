<?php

$users = App::get('database')->selectAll('users');//we save the result of our fetching info query to $users. Basically, here we activate the QueryBuilder, to fetch users from the users table.
// This will fetch info from db.
//This is possible, becuase the selectAll has a return command in the end. $users will be used in the index.view.php to diplay the data with a foreach loop. selectAll is a method from the QueryBuilder.php, it fetches data from db. 
//Our table name in our db is users. 


require 'views/index.view.php';//we will display our shit to the user here (What was previously fetched with the QueryBuilder)