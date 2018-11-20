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
	<header>
		<h1>Users</h1>
		<p>Create or delete who you want, you are the master.</p>
	</header>


	<section id="wrapper-form">

		<div class="container-add">
			<p class="title">Create a user</p>
			<div class="background-form">
				<form method="post" action="" class="form">
					<label for="pseudo">PSEUDO</label>
					<input type="text" name="pseudo-add" id="nom"/>
					<label for="password">PASSWORD</label>
					<input type="password" name="mdp-add" id="mdp"/>
					<input type="submit" name="envoyer" value="CREATE" class ="button"/>
				</form> 
			</div>
		</div>


		<div class="container-modify">
			<p class="title">Modify a user</p>
			<div class="background-form">
				<form method="post" action="" class="form">
					<label for="pseudo">PSEUDO</label>
					<input type="text" name="pseudo" id="nom"/>
					<label for="password">PASSWORD</label>
					<input type="password" name="mdp" id="mdp"/>
					<input type="submit" name="envoyer" value="MODIFY" class ="button"/>
				</form> 
			</div>
		</div>


		<div class="container-delete">
			<p class="title">Delete a user</p>
			<div class="background-form">
				<p class="titre-delete">Pseudo</p>

				<form method="post" action="" class="form-delete">
					<?php foreach($usersList as $userList): ?>
					<input type="checkbox" name="id" value="<?php echo $id; ?>"/>
					<label for="users"><?= $userList->nameAdmin(); ?></label>
					<?php endforeach ?>
					<input type="submit" name="envoyer" value="DELETE" class ="button"/>
				</form> 

			</div>
		</div>

	</section>
</body>



<footer> </footer>


</html>