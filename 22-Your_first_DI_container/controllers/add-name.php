<?php
//the function of this file will be to add user name to the db
//quick note: $app['database'] IS = TO new QueryBuilder(Connection::make($app['config']['database']));

App::get('database')->insert('users',[//App is a class from App.php. get() is a static method from the App class, ment to activate what is under the 'database' label. Under 'database label' is a creation of a new QueryBuilder object. Source for this creation is on the bootstrap.php. So we are creating a new QueryBuilder. insert() is a method from the QueryBuilder. users is our db table name where we want to insert the received user name...

	'name' => $_POST['name'],//...which was received from the forms, and was stored in the $_POST superglobal.

]);

//Jeff: in php we can redirect by setting a header

header("Location: /");//with this redirecting we will be able to set the users name on our webpage (while the name is being sent to the db). The second special case is the "Location:" header. It sends this header back to the browser.
//The header() function sends a raw HTTP header to a client. So, header will send ' /' to the browser. This will lead us to controllers/index.php, which will lead us to index.view.php (the main home page), where we will be able to see displayed the newly inserted name.
//