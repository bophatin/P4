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
		<h1 class="title">Chapitre <?= $post->id(); ?></h1>
		<nav>
			<ul>
				<li><?= $post->title(); ?></li>
				<li>Paru le <?= $post->datePost(); ?></li>
			</ul>
		</nav>
	</header>

	<section>
		<div class="container-art">
			<a href="index.php?p=allPostsView" class="back-button">Retour</a>
			<p class="content"><?= $post->contentPost(); ?></p>
		</div>
	</section>

	<section id="wrapper-comment">
		<div class="container-comment">
			<h2>Any reactions ?</h2>
			<div class="form">
				<form method="post">
					<p><label for="name-form">Nom</label></p>
					<p><input type="text" name="name-form"></p>
					<textarea name="comment-form" placeholder="Commentaire" rows="5" cols="40"></textarea>
					<br/>
					<input type="submit" name="send-comment" value="send message" class="button">
				</form>
			</div>
		</div>
	</section>

	<section class="wrapper">
		<div class="container-h2"><h2>Comments<br/>list</h2></div>
		<div class="container-form">
			<table>
				<tr>
					<?php foreach($comments as $comment): ?>
					<td><?= $comment->name(); ?></td>
					<td><?= $comment->contentComment(); ?></td>
					<td><a href="view/script/script.php?id=<?= $comment->id(); ?>">Signaler</a></td>
					<?php endforeach ?>
				</tr>
			</table>
		</div>
	</section>

</body>



<footer></footer>


</html>