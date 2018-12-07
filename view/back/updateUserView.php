<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/users.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<title>Gestion Users - BO Forteroche</title>
</head>



<body>

	<h1>Wanna update ?</h1>

	<section id="wrapper-form">
		<div class="container-add">
			<p class="title">Update a user</p>
			<div class="background-form">
				<form method="post" action="" class="form">
					<label for="pseudo">PSEUDO</label>
					<input type="text" name="pseudo-new" id="nom" value="<?= $getUser->nameAdmin(); ?>"/>
					<label for="password">PASSWORD</label>
					<input type="password" name="mdp-new" id="mdp" value="<?= $getUser->password(); ?>"/>
					<input type="submit" name="save" value="SAVE" class ="button"/>
				</form> 
			</div>
		</div>
	</section>



</body>



<footer></footer>


</html>