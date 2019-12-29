<?php

function dd($data){
	echo "<pre>";
	die(var_dump($data));
	echo "</pre>";
}

function bouncer($age){
	if ($age>=21) {
		echo "Come on in!";
	} else {
		echo "Grow up first kid!";
	}
}

?>