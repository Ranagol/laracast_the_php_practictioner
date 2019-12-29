<!DOCTYPE html>
<html>
<head>
	<title>PDO</title>
</head>
<body>
<h2>PDO database connection</h2>
<p>Our app is retrieveing data from the db. The data is in the $tasks, and $tasks is an array. Therefore we must use a foreach loop, to use the data in the array.</p>
<ul>
	<?php 
		foreach ($tasks as $task) {
			if ($task->completed) {
				echo "<strike>";//strike is a middle line through, cross line on the item. Basically here we want all completed tasks to be strike through.
				
					echo "<li>$task->description</li>";
				echo "</strike>";
			} else {
				echo "<li>$task->description</li>";
			}
		}
	?>
</ul>

</body>
</html>