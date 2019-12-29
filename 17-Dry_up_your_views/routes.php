<?php
//here the $router is now getting the what/where to route info, it is in the define() method



$router->define([
	'' => 'controllers/index.php', //if there is no additional url, that will lead to our home page
	'about' => 'controllers/about.php',//if the user types example.com/about we want him to be taken to the about page
	'about/culture' => 'controllers/about-culture.php',//if the user types example.com/about/culture we want him to be taken to the about-culture.php page
	'contact' => 'controllers/contact.php',
]);
//we want to set up routes between the actual view and the controller part. The controller is basically an entry point. Here every view page will have a controller. Here basically we have an array that has all the routes info as key(links)/value(what controller to load) pairs. This array is used as an argument in the define() method.