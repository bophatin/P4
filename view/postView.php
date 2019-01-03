<!DOCTYPE html>

<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/post.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<title>Les Chapitres - Jean Forteroche</title>
</head>

<body>
	<header>
		<h1 class="title">Chapitre <?= $post->id(); ?></h1>
		<nav>
			<ul>
				<li><a href="index.php?p=allPostsView" class="back-button">Retour</a></li>
				<li><?= $post->title(); ?></li>
				<li>Paru le <?= $post->datePost(); ?></li>
			</ul>
		</nav>
	</header>

	<div id="wrapper-art">
		<div class="container-art">
			<p class="content"><?= $post->contentPost(); ?></p>
		</div>
	</div>

	<section id="wrapper">
		<div class="container">
			<div class="container-left">
				<section id="wrapper-comment">
					<div>
						<h2>Dites-nous</h2>
						<div class="form">
							<form method="post">
								<p><label for="name-form">Nom</label></p>
								<p><input type="text" name="name-form"></p>
								<textarea name="comment-form" placeholder="Commentaire" rows="5" cols="40" class="placeholder"></textarea>
								<br/>
								<input type="submit" name="send-comment" value="envoyer" class="button">
							</form>
						</div>
					</div>
				</section>
			</div>
			<div class="container-right">
				<section id="wraper">
					<div class="container-h2"><h3>Commentaires</h3></div>
					<div>
						<table>
							<?php foreach($comments as $comment): ?>
							<tr>
								<td><?= $comment->name(); ?></td>
								<td><?= $comment->contentComment(); ?></td>
								<td><a href="view/script/script.php?id=<?= $comment->id(); ?>">Signaler</a></td>
							</tr>
							<?php endforeach ?>
						</table>
					</div>
				</section>
			</div>
		</div>
	</section>

	<footer>
		<section id="wrapper-5">
			<div class="container-5">
				<div class="left-contain">
					<h4>Contact</h4>
					<form method="post" action="">
						<input type="text" name="email-contact" placeholder="Votre email" class="input" />
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