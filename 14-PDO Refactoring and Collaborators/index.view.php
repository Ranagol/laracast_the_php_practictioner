<!DOCTYPE html>
<html>
<head>
	<title>PDO</title>
</head>
<body>
<h2>PDO database connection</h2>

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