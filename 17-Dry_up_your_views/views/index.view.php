<?php require('partials/head.php'); ?>


<h2>17-Dry up your views</h2>



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

<?php require('partials/footer.php'); ?>