<?php

$query = require "bootstrap.php";//whatever that comes back from bootstrap will be saved in the $query. This is possible, because bootstrap.php ends with a return command. Boostrap will be responsible for the 'behind the scenes work'. Boostrap connects to sql (Connection.php) and retrieves info from sql (QueryBuilder.php).

$tasks = $query->selectAll('todos');//we save the result of our query to $tasks. This is possible, becuase the selectAll has a return command in the end. $tasks will be used in the index.view.php to diplay the data with a foreach loop. selectAll is a method from the QueryBuilder.php, it fetches data from db. Our table name in our db is todos.

require 'index.view.php';//we will display our shit to the user here
