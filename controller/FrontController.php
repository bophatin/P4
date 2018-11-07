<?php  

class FrontController {

	public static function getPosts() {
		$list = new PostManager();
		$posts = $list->getPost();
		require 'view/allPostsView.php';
	}

	public static function getArt() {
		$article = new PostManager();
		$id = htmlspecialchars(($_GET['id']));
		$datas = $article->get($id);
		require 'view/postView.php';
	}
} 