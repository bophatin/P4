<?php  

class FrontController {

	public static function getPosts() {
		$list = new PostManager();
		$posts = $list->getPost();
		require 'view/allPostsView.php';
	}


	public static function getArt() {

		if (isset($_GET['id']) AND !empty($_GET['id'])) {
			$id = htmlspecialchars(($_GET['id']));

			// AFFICHAGE DE L'ARTICLE EN FONCTION DU POST CLIQUÉ
			$article = new PostManager();
			$post = $article->get($id);


			// ENVOI D'UN COMMENTAIRE
			if(isset($_POST['send-comment'])) {
				if(isset($_POST['name-form'], $_POST['comment-form'])) {
					if(!empty($_POST['name-form']) AND !empty($_POST['comment-form'])) {

						$commPost = new Comment([
							'name' => htmlspecialchars($_POST['name-form']),
							'content_comment' => htmlspecialchars($_POST['comment-form']),
							'id_post' => $id
						]);

						$add = new CommentManager();
						$addComment = $add->add($commPost);

						header('Location: index.php?p=postView&id='.$id); 
						echo "Votre commentaire a bien été posté";
					} else {
						echo "<script> alert('Tous les champs doivent être complétés') </script>";
					}
				} else {
					require 'view/404View.php';
				}
			} 
				
			// AFFICHAGE DES COMMENTAIRE EN FONCTION DU POST CLIQUÉ
			$commManager = new CommentManager();
			$comments = $commManager->get($id);
			require 'view/postView.php';
		} else {
			require 'view/404View.php';
		}
	}

} 