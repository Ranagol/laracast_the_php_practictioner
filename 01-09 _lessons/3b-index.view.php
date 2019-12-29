<!DOCTYPE html>
<html>
<head>
	<title>3b</title>
	<style type="text/css">
		header{
			background: grey;
			padding: 2em;
			text-align: center;
		}
	</style>
</head>
<body>

<ul>
	
	<!--1. way of doing this-->
	<?php foreach ($names as $name) : ?>
		<li><?php echo $name; ?></li>
	<?php endforeach; ?>



	<!--2. way of doing this-->
	<?php
		foreach ($names as $name) {
			echo "<li>$name</li>";
		}
	?>
	
</ul>


</body>
</html>