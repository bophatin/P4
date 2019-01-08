<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/updateBo.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<title>Update Users - BO Forteroche</title>
</head>



<body>

	<h1>Want to update ?</h1>

	<div id="wrapper-form">
		<div class="container-add">
			<p class="title">Update a user</p>
			<div class="background-form">
				<form method="post" class="form">
					<label for="pseudo">PSEUDO</label>
					<input type="text" name="pseudo-new" id="nom" value="<?= $getUser->nameAdmin(); ?>"/>
					<label for="password">PASSWORD</label>
					<input type="password" name="mdp-new" id="mdp" value="<?= $getUser->password(); ?>"/>
					<input type="submit" name="update" value="UPDATE" class ="button"/>
				</form> 
			</div>
		</div>
	</div>

</body>



</html>