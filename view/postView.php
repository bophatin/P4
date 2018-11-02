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
		<h1 class="title">Chapitre <?= $datas->id(); ?></h1>
		<nav>
			<ul>
				<li><?= $datas->title(); ?></li>
				<li>Paru le <?= $datas->datePost(); ?></li>
			</ul>
		</nav>
	</header>

	<section id="wrapper-art">
		<div class="container-art">
			<button class="back-button">Retour</button>
			<p class="content"><?= $datas->contentPost(); ?></p>
		</div>
	</section>

</body>



<footer></footer>


</html>