<?php
//boostrap will be responsible for the 'behind the scenes work (about connecting to the db, and fetching data from the db)'

$app = [];//$app is at this moment an empty array. It seems to me that Jeffrey will store here different subapps as keys in this array. Example: $app['config'] = require 'config.php'... Here, possibly, the ['config'] will be the key, and the require 'config.php' will be the value.

$app['config'] = require 'config.php';//...Here, possibly, the ['config'] is the key, and the require 'config.php' is the value.
//Jeffrey: with $app[$config] we will be able to call config.php.
//config.php stores all the sensitive data about connection in an array, like password for example. Users must not see this! Because everything is in an array (and there is a return command too), we can store this array from the config.php in this variable $config. This $config will be used by Connection.php.
 
require 'core/Router.php';

require 'core/Request.php';

require "core/database/Connection.php";//this is how we require a file that is in a different folder called database. Coonection.php will create a connection with the db.

require "core/database/QueryBuilder.php";//this is responsible for getting the info

$app['database'] = new QueryBuilder(

Connection::make($app['config']['database']));// we are making a connection here and creating a query for the db. We are creating a new QueryBuilder object from the QueryBuilder.php, which is using the Connection class and the make() method from the Connection.php.   make() is static, so we are calling it with :: . The $config variable stores an array named 'database' (see config.php for this), and this 'database' array stores all the necesarry data for the sql connection.
