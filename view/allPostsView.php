<!DOCTYPE html>

<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/allPosts.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<title>Les chapitres - Jean Forteroche</title>
</head>



<body>

	<header>
		<h1 class="title">Jean Forteroche</h1>
		<nav>
			<ul>
				<li><a href="index.php" class="butt-back">Home</a></li>
				<li>Découvrez tous les jeudis un nouveau chapitre du roman !</li>
			</ul>
		</nav>
	</header>


	<section id="wrapper">
		<div class="container">
			<div class="container-left"><img src="public/img/jf-office.jpg"></div>
			<div class="container-right"><img src="public/img/baltimore.jpg"></div>
		</div>
		<div class="container-h2"><h2>Un billet pour l'Alaska</h2></div>
	</section>


	<section id="wrapper-art">
		<div class="container-art">
			<?php foreach($posts as $post): ?>
			<article>
				<p class="post-title">Chap <?= $post->id(); ?> - <?= $post->title(); ?></p>
				<p class="content-extrait"><?= substr($post->contentPost(), 0, 300) .'...' ?></p>
				<div class="btn"><a href="index.php?page=postView&id=<?=$post->id();?>">Lire le chapitre</a></div>
			</article>
			<?php endforeach ?>
		</div>
	</section>


	<footer>
		<section id="wrapper-5">
			<div class="container-5">
				<div class="left-contain">
					<h4>Contact</h4>
					<form method="post" action="">
						<input type="text" name="email-contact" placeholder="Votre email" class="input"/>
						<textarea name="message-contact" rows="4" cols="50" placeholder="Message"></textarea>
						<input type="submit" name="send-contact" value="send message"/>
					</form> 
				</div>
				<div class="right-contain">
					<p class="p-foot">Jean Forteroche, 2018.</p>
					<div class="rs">
						<p>Stay in touch</p>
						<div class="rs-icons">
							<span><i class="fab fa-twitter"></i></span>
							<span><i class="fab fa-facebook-f"></i></span>
							<span><i class="fab fa-google-plus-g"></i></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	</footer>
</body>



</html>