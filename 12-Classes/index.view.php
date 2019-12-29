<!DOCTYPE html>
<html>
<head>
	<title>Class 101 basics</title>
</head>
<body>
<h2>Class 101 basics</h2>
<p>Quick explanation. Here, we store our tasks in an array, instead of a database, for learning purpose. In the next lesson we will connect our php file with a database.</p>

<ul>
	<?php 
		foreach ($tasks as $task) {//we have to iterate through every task with a foreach loop
			if ($task->completed) {//completed is a column in db, and it has boolean value. It can be true or false.
				echo "<strike>";//strike is a middle, cross line on the item. Here we want to make our todo to have a cross-line in the middle, if it is completed.
				echo "<li>$task->description</li>";
				echo "</strike>";
			} else {
				echo "<li>$task->description</li>";//...and if it is not completed, then just display the task
			}
		}
	?>
</ul>

</body>
</html>