<?php

return [//this is an array, but before the array there is a return command!
	'database' => [//...array 'database'
		'name' => 'mytodo',
		'username' => 'root',
		'password' => '',
		'connection'=> 'mysql:host=127.0.0.1',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION	//This setting is also useful during debugging, as it will effectively "blow up" the script at the point of the error, very quickly pointing a finger at potential problem areas in your code
		],
	]

];