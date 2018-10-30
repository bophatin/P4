<?php  

class FrontController {

	public static function getPosts() {
		$postManager = new PostManager();
		$posts = $postManager->getPost();
		require 'model/allPostsview.php';
	}

} 