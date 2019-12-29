<?php

//boostrap will be responsible for the 'behind the scenes work'

$config = require 'config.php';//config.php stores all the sensitive data about connection in an array, like password for example. Users must not see this! Because everything is in an array (and there is a return command too), we can store this array from the config.php in this variable $config. This $config will be used by Connection.php.

require "database/Connection.php";//this is how we require a file that is in a different folder called database. Coonection.php will create a connection with the db.

require "database/QueryBuilder.php";//this is responsible for getting the info

return new QueryBuilder(Connection::make($config['database']));// we are making a connection here and creating a query for the db. We are creating a new QueryBuilder object from the QueryBuilder.php, which is using the Connection class and the make() method from the Connection.php.   make() is static, so we are calling it with :: . The $config variable stores an array named 'database' (see config.php for this), and this 'database' array stores all the necesarry data for the sql connection.
