<!DOCTYPE html>
<html>
<head>
	<title>PDO</title>
</head>
<body>
<h2>16-Routing</h2>

<nav>
	<ul>
		<li><a href="about">About page</a></li>
		<li><a href="contact">Contact page</a></li>
	</ul>
</nav>



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