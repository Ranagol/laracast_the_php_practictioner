<?php

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$min = 3;
	$max = 10;
	echo "Welcome, " . $username ."!" . "<br>";
	print_r($_POST);

}

?>





<!DOCTYPE html>
<html>
<head>
	<title>Form2</title>
</head>
<body>

<h1>Username sending, receiveng and checking</h1>

<form action="8-form2.php" method="post">
	<input type="text" placeholder="username" name="username">
	<input type="submit" name="submit">
</form>

</body>
</html>