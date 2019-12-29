<!DOCTYPE html>
<html>
<head>
	<title>5-asociative</title>
</head>
<body>
	
<ul>
	<li>
		<strong>Name: </strong> <?php echo $task["title"]; ?>
	</li>

	<li>
		<strong>Due date: </strong> <?php echo $task["due"]; ?>
	</li>

	<li>
		<strong>Person responsible: </strong> <?php echo $task["assigned to"]; ?>
	</li>

	<li>
		<strong>Status: </strong> 
		<?php  
		if ($task["completed"]) {//you get "completed" when you have true value in the status
			echo "&#9989";
			} else {
				echo "Incomplete";
		}

		?>
	</li>
	<li>
		<strong>Urgent:</strong> 
		<?php
		if ($task["urgent"]) {
			echo "Very very urgent";
			} else {
				echo "Meh... not urgent";
		}
		?>
	</li>
</ul>


</body>
</html>