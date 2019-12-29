<?php
//boostrap will be responsible for the 'behind the scenes work (connecting to the db, and fetching data from the db)'
//"Dependency injection Container" sounds like a super scary thing. But it's easy to understand! Think of them as boxes. Apply a label, and throw your stuff into the box. When you need them back, simply look for the corresponding label!


App::bind('config', require 'config.php');// this is the box----require 'config.php'. And the 'config' is the label. The App is a class from App.php. bind() is a method from App class. Bind means: kosd ossze, osszekotni.
//App is a class from App.php. bind() is a static method from App class. In the future, if we use the 'config' label, we will requiring the config.php.



// we are making a connection here and creating a query for the db.
App::bind('database', new QueryBuilder(//we are activating the bind() method from the App class.When the 'database' label is used, create a new Query builder object)...The QueryBuilder will need a $pdo as an argument to make a connection with the db. For that, the QueryBuilder will need all the details that is in the config.php (which will be activated with the get method from the App class like this: get('config')). In the future, if we use the 'database' label, we will create a new QueryBuilder object. NOTE THAT IN THIS LINE, HERE WE ARE NOT CREATING A NEW QueryBuilder object!!

	Connection::make(App::get('config')['database'])//The  static make() method from the Connection class knows how to use the necesary connection data (username, password, dbname...) but it needs acces to it, it need a $config argument, which will give him acces to this necesary data.
	));//App::get('config') is requiring the config.php, so now we have acces to all the necesary connection data. The get() is a static method from App class.
	//
	//HERE we are creating a new QueryBuilder object from the QueryBuilder.php, which is using the Connection class and the make() method from the Connection.php.  
	//OK, I DON'T QUITE UNDERSTAND THIS PART, BUT FOR TIME BEING, JUST LEAVE IT...----------('config')['database'])
