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

	<section>
		<div class="container-art">
			<button class="back-button"><a href="index.php?p=allPostsView">Retour</a></button>
			<p class="content"><?= $datas->contentPost(); ?></p>
		</div>
	</section>

	<section id="wrapper-comment">
		<div class="container-comment">
			<h2>Any reactions ?</h2>
			<div class="form">
				<form method="post">
					<p><label for="nom">Nom</label></p>
					<p><input type="text" name="name-form"></p>
					<textarea name="comment-form" placeholder="Commentaire" rows="5" cols="40"></textarea>
					<br/>
					<input type="submit" value="send message" class="button">
				</form>
			</div>
		</div>
	</section>

</body>



<footer></footer>


</html>