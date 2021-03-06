<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/log.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<title>Back Office - Forteroche</title>
</head>



<body>
	<header>
		<h1>Back Office</h1>
	</header>

	<div id="form">
		<div class="background-form">
			<form method="post">
			    <label for="pseudo-log">PSEUDO</label>
			    <input type="text" name="pseudo-log" id="pseudo-log"/>
			    <label for="mdp-log">MOT DE PASSE</label>
			    <input type="password" name="mdp-log" id="mdp-log"/>
			    <input type="submit" name="send-log" value="CONNEXION" class ="button"/>
			</form> 
			<div class="error-msg"><?php echo $error ?></div>
		</div>
	</div>

	<footer>
		<p class="footer-name">Jean Forteroche, 2018.</p>
	</footer>
</body>




</html>
