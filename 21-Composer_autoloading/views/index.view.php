<?php require('partials/head.php'); ?>


<!--HERE WE JUST DISPLAYING THE INFO FROM THE DB-->
<?php foreach ($users as $user) :?><!--This is the fancy version of the foreach loop-->
	<li><?= $user->name; ?></li>
<?php endforeach;?>



<!--HERE WE SUBMIT DATA TO THE DB-->
<h2>21</h2>
<h2>Submit your name</h2>

<form method="POST" action="/names"><!--/names here is just a uri, that will activate 'controllers/add-name.php' through the routes.php. action="/names" here means, that when we push the submit, the uri will change to.../names. Then, because of our router it will take us to controllers/add-name.php...and so on  -->
	<input name="name"></input>
	<button type="submit">Submit</button>


</form>



<?php require('partials/footer.php'); ?>