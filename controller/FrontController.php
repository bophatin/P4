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

						header('Location: index.php?page=postView&id='.$id); 
						echo "Votre commentaire a bien été posté";
					} else {
						$error = "Tous les champs doivent être complétés";
					}
				} else {
					require 'view/404View.php';
				}
			} 
				
			// AFFICHAGE DES COMMENTAIRE EN FONCTION DU POST CLIQUÉ
			$commManager = new CommentManager();
			$comments = $commManager->get($id);

			// GERE AFFICHAGE PAGE OU ERREUR
			if ($post->id() == false) {
				require 'view/404View.php';
			} else {
				require 'view/postView.php';
			}
		} else {
			require 'view/404View.php';
		}
	}


	public static function signaler() {
		if(isset($_GET['id']) AND !empty($_GET['id'])) {
			$id = htmlspecialchars($_GET['id']);
			$signaler = '';
			$signaler++;

			$newSignComm = new Comment([
				'signaler' => $signaler,
				'id' => htmlspecialchars($_GET['id'])
			]);

			$NSM = new CommentManager();
			$upSignaler = $NSM->upSignaler($newSignComm);
			header('Location:' .$_SERVER['HTTP_REFERER']);
		}
	}

} 