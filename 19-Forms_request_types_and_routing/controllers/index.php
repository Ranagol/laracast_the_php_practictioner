<?php

$tasks = $app['database']->selectAll('todos');//we save the result of our query to $tasks. This is possible, becuase the selectAll has a return command in the end. $tasks will be used in the index.view.php to diplay the data with a foreach loop. selectAll is a method from the QueryBuilder.php, it fetches data from db. Our table name in our db is todos. WHAT THE FUCK IS THIS APP SHIT?

require 'views/index.view.php';//we will display our shit to the user here