<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="public/postBo.css"/>
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
	<script>
  		tinymce.init({
    	selector: '#mytextarea'
 		});
  	</script>
	<title>Gestion Articles - BO Forteroche</title>
</head>

<body>
	<header>
		<h1>Hello <?php echo $_SESSION['pseudo-log']; ?></h1>
		<nav>
			<ul>
				<li><a class="js-scrollTo" href="#wrapper-2">Posts List</li>
				<li><a class="js-scrollTo" href="#wrapper-3">Comments List</li>
				<li><a class="js-scrollTo" href="admin.php?p=usersView">Users</a></li>
				<li><a href="view/script/logout.php">Log out</a></li>
			</ul>
		</nav>
	</header>

	<section id="wrapper">
		<div class="container-h2"><h2>Add a post</h2></div>
		<div class="container-form">
			<form method="post" action="">
				<label for="title">Title</label>
				<input type="text" name="title"/>
				<label for="content">Content</label>
				<textarea id="mytextarea" name="content" rows="30"></textarea>
				<input type="submit" name="addPost" value="CREATE POST" class="button-add">
			</form>
		</div>
	</section>

	<section id="wrapper-2">
		<div class="container-h2"><h3>Posts list</h2></div>
		<div class="container-form">
			<table>
				<?php foreach($posts as $post): ?>
				<tr>
					<td><label for="id"><?= $post->id(); ?></td>
					<td><?= $post->title(); ?></td>
					<td><?= $post->datePost(); ?></td>
					<td>
						<a href="admin.php?p=updatePostView&id=<?=$post->id();?>"><input type="submit" name="update-post" value="update" class="butt-link"></a>
					</td>
					<td><form method="post" action="admin.php?p=postEditView&id=<?=$post->id();?>"><input type="submit" name="delete-post" value="delete" class="butt-link"/></form></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	</section>

	<section id="wrapper-3">
		<div class="container-h2"><h4>Comments<br/>list</h2></div>
		<div class="container-form">
			<table>
				<?php foreach($comments as $comment): ?>
				<tr>
					<td><label for="id"><?= $comment->idPost(); ?></label></td>
					<td><?= $comment->name(); ?></td>
					<td><?= $comment->contentComment(); ?></td>
					<td><span class="signaler"><?= $comment->signaler(); ?></span></td>
					<td><form method="post" action="admin.php?p=postEditView&id=<?=$comment->id();?>" ><input type="submit" name="delete-comment" value="delete" class="butt-link"/></form></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	</section>

	<footer>
		<p class="footer-name">Jean Forteroche, 2018.</p>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" href="public/js/anim.js"></script>
	<script type='text/javascript' src='public/js/anim.js'></script>
</body>





</html>