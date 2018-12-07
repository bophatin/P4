<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="public/postBo.css"/>
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<title>Gestion Articles - BO Forteroche</title>
</head>



<body>
	<header>
		<h1>Post Edit</h1>
		<p>Create or delete any posts, you got the keys.</p>
	</header>

	<section class="wrapper">
		<div class="container-h2"><h2>Add a post</h2></div>
		<div class="container-form">

			<form method="post" action="">
				<label for="title">Title</label>
				<input type="text" name="title"/>
				<label for="content">Content</label>
				<textarea name="content" rows="30"></textarea>
				<input type="submit" name="addPost" value="CREATE POST" class="button-add">
			</form>

		</div>
	</section>

	<section class="wrapper">
		<div class="container-h2"><h2>Posts list</h2></div>
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
					<td><form method="post" action="supprimer.php?id=<?=$post->id();?>"><input type="submit" name="delete-post" value="delete" class="butt-link"/></form></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	</section>

	<section class="wrapper">
		<div class="container-h2"><h2>Comments<br/>list</h2></div>
		<div class="container-form">
			<table>
				<?php foreach($comments as $comment): ?>
				<tr>
					<td><label for="id"><?= $comment->id(); ?></label></td>
					<td><?= $comment->name(); ?></td>
					<td><?= $comment->contentComment(); ?></td> 
					<td><form method="post" action="supprimer.php?id=<?=$comment->id();?>" ><input type="submit" name="delete-comment" value="delete" class="butt-link"/></form></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	</section>

</body>



<footer></footer>


</html>