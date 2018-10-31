<?php  

class FrontController {

	public static function getPosts($db) {
		$list = new PostManager($db);
		$posts = $list->getPost();
		require 'view/allPostsView.php';
	}
} 