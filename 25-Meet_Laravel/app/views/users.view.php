<!--The user.view.php displays all the users from the db, and has the form for submiting new users.-->
<h2>25</h2>

<?php require('partials/head.php'); ?>


<h1>All users</h1>

<!--HERE WE JUST DISPLAYING THE INFO FROM THE DB-->
<?php foreach ($users as $user) :?><!--This is the fancy version of the foreach loop-->
	<li><?= $user->name; ?></li>
<?php endforeach;?>



<!--HERE WE SUBMIT DATA TO THE DB-->

<h1>Submit your name</h1>

<form method="POST" action="/users"><!-- action="/users" here means, that when we push the submit, the uri will change to.../users. /users here is just a uri, that will activate 'UsersController@index' through the routes.php.  -->
	<input name="name"></input>
	<button type="submit">Submit</button>


</form>



<?php require('partials/footer.php'); ?>