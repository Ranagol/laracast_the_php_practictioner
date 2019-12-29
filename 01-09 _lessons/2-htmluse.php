<!DOCTYPE html>
<html>
<head>
	<title>2-Htmluse</title>
	<style type="text/css">
		header{
			background: grey;
			padding: 2em;
			text-align: center;
		}
	</style>
</head>
<body>

<header>
	<h1>
		<?php
		
		$name = htmlspecialchars($_GET["name"]);
		echo "Hello, $name!";
		?>
	</h1>
</header>
//$_GET["name"] this will get data from the url line (the name of the user)
//htmlspecialchars this will desinfect the received data (at this point I don't quite understand how)

</body>
</html>