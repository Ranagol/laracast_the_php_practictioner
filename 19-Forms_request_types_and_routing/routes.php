<?php

//router is new static object from the Router.php
$router->get('','controllers/index.php');//the get() method is defined in Router.php. $router is something similar like a new object from the Router class. But it is static, so it doesn't have to be instantiated.
$router->get('about','controllers/about.php');
$router->get('about/culture','controllers/about-culture.php');
$router->post('names','controllers/add-name.php');//this only responds to post requests

