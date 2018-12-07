<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="public/postBo.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<title>Gestion Users - BO Forteroche</title>
</head>



<body>

	<h1>Wanna update ?</h1>

	<section class="wrapper">

		<div class="container-form">

			<form method="post" action="">
				<label for="title-new">Title</label>
				<input type="text" name="title-new" value="<?= $getPost->title(); ?>"/>
				<label for="content-new">Content</label>
				<textarea name="content-new" rows="30"><?= $getPost->contentPost(); ?></textarea>
				<input type="submit" name="save-post" value="UPDATE POST" class="button-add">
			</form>

		</div>
	</section>

</body>



<footer></footer>


</html>