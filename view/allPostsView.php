<!DOCTYPE html>

<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/allPosts.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<title>Les chapitres - Jean Forteroche</title>
</head>



<body>

	<header>
		<h1 class="title">Le livre de Baltimore</h1>
		<p class="sous-titre">Rendez-vous tous les jeudis pour découvrir un nouveau chapitre</p>
	</header>

	<section id="wrapper-1">
		<?php foreach($posts as $post): ?>

			<article class="line-post-1">
					<div class="left-bloc">
						<div class="num-art"><span>0<?= $post->id(); ?></span></div>
						<img alt src=""/>
					</div>
					<div class="extrait-art">
						<p class="title-art"><?= $post->title(); ?></p>
						<p><?= substr($post->contentPost(), 0, 300) .'...' ?></p>
						<button><a href="index.php?p=postView&id=<?=$post->id();?>">Lire le chapitre</a></button>	
					</div>
			</article>

		<?php endforeach ?>
	</section>

</body>



<footer></footer>


</html>