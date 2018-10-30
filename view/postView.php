<!DOCTYPE html>

<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/post.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<title>Les Chapitres - Jean Forteroche</title>
</head>



<body>

	<header>

		<?php foreach($db->query('SELECT * FROM post') as $posts): ?>
		<h1 class="title">Chapitre <?= $posts->id ?></h1>
		<nav>
			<ul>
				<li><?= $posts->title ?></li>
				<li>Paru le 19 novembre 2019</li>
			</ul>
		</nav>
	</header>

	<section id="wrapper-art">
		<div class="container-art">
			<button class="back-button">Retour</button>
			<p class="content"></p>
		<?php endforeach ?>

		</div>
	</section>

</body>



<footer></footer>


</html>