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
			$article = new PostManager();
			$datas = $article->get($id);
			require 'view/postView.php';
		} else {
			die('Erreur'); // Mettre page 404
		}
	}

	public static function addComment() {
		if(isset($_POST['send-comment'])) {
			if (isset($_POST['name-form'], $_POST['comment-form'])) {
				if (!empty($_POST['name-form']) AND !empty($_POST['comment-form'])) {
					$commPost = new Comment([
						'name' => htmlspecialchars($_POST['name-form']),
						'content_comment' => htmlspecialchars($_POST['comment-form'])
					]);

					$add = new CommentManager();
					$addComment = $add->add($commPost);
					header('Location: index.php?p=allPostsView'); 
				} else {
					echo "Veuillez remplir tous les champs";
				}
			}
		} 
	}


} 