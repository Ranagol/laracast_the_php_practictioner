<?php

//boostrap will be responsible for the 'behind the scenes work'

require "database/Connection.php";//this is how we require a file that is in a different folder called database. Coonection.php will create a connection with the db.

require "database/QueryBuilder.php";//this is responsible for getting the info

return new QueryBuilder(Connection::make());// we are making a connection here and creating a query for the db. We are creating a new QueryBuilder object from the QueryBuilder.php, which is using the Connection class and the make() method from the Connection.php.   make() is static, so we are calling it with :: .
