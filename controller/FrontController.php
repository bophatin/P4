<?php  

class FrontController {

	public static function getPosts($db) {
		$list = new PostManager($db);
		$posts = $list->getPost();
		require 'view/allPostsView.php';
	}

	public static function getArt($id) {
		$art = new PostManager($id);
		$datas = $art->get($id);
		require 'view/postView.php';
	}
} 