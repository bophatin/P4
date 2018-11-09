<?php  

class FrontController {


	public static function getPosts() {
		$list = new PostManager();
		$posts = $list->getPost();
		require 'view/allPostsView.php';
	}


	public static function getArt() {
		$id = htmlspecialchars(($_GET['id']));

		$article = new PostManager();
		$datas = $article->get($id);
		require 'view/postView.php';
	}


	public static function addComment() {
		$name_form = htmlspecialchars($_POST['name-form']);
		$comment_form = htmlspecialchars($_POST['comment-form']);
		
		$add = new CommentManager();
		$addComment = $add->add($name_form, $comment_form);
		require 'view/postView.php';
	}




} 