<?php

if(isset($_POST["submit"])){

$username = $_POST["username"];
$password = $_POST["password"];
$minimum = 3;
$maximum = 10;
$names = ["Edwin","Tom","Mike","Jane","Mila"];

if (strlen($username)<$minimum) {
	echo "The username must be longer than 5 letters <br>";
}

if (strlen($username)>$maximum) {
	echo "The username must be shorter than 10 letters <br>";
}

if (!in_array($username, $names)) {
	echo "Sorry, you can not login <br>";
} else {
	echo "Welcome, " . $username . "!";
}






/*
echo $username;
echo $password;
*/
}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Forms</title>
</head>
<body>

<form action="7-form.php" method="post">
    <input type="text" name="username" placeholder="Enter username">
    <input type="password" name="password" placeholder="Enter password"><br>
    <input type="submit" name="submit">
</form>

</body>
</html>