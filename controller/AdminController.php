<?php

class AdminController {

	public static function login() {
		$new_user = new UserManager();
		$users = $new_user->getUsers();
	}


	// USERS

	public static function addUser() {
		$newUser = new User([
			'name_admin' => htmlspecialchars($_POST['pseudo-add']),
			'password' => password_hash(htmlspecialchars($_POST['mdp-add']), PASSWORD_DEFAULT)
		]);

		$addUserManager = new UserManager();
		$addUser = $addUserManager->add($newUser);
	}

	public static function getListUsers() {
		$newListManager = new UserManager();
		$usersList = $newListManager->getUsers();
		require 'view/back/usersView.php';
		
	}

	public static function deleteUser() {
		$newUser2 = new User([
			'id' => htmlspecialchars($_GET['id']),
		]);

		$newUserManager = new UserManager();
		$delUser = $newUserManager->delete($newUser2);
	}

	public static function getUserId() {
		$id = htmlspecialchars(($_GET['name_admin']));

		$getUserManager = new UserManager();
		$getUser = $getUserManager->get($id);
		require 'view/postView.php';
	}

	public static function updateUser() {
		$newUpUser = new User([
			'name_admin' => htmlspecialchars($_POST['pseudo-add']),
			'password' => password_hash(htmlspecialchars($_POST['mdp-add']), PASSWORD_DEFAULT)
		]);

		$newUpUserManager = new UserManager();
		$UpdateUser = $newUpUserManager->update($newUpUser);
	}



	// EDIT POSTS

	public static function getLists() {
		$list = new PostManager();
		$posts = $list->getPost();

		$commManager = new CommentManager();
		$comments = $commManager->getComments();
		require 'view/back/postEditView.php';
	}

	public static function addPost() {
		$newPost = new Post([
			'title' => htmlspecialchars($_POST['title']),
			'content_post' => htmlspecialchars($_POST['content'])
		]);

		$newPostManager = new PostManager();
		$addNewPost = $newPostManager->add($newPost);
	}

	public static function deletePost() {
		$newPost2 = new Post([
			'id' => htmlspecialchars($_GET['id']),
		]);

		$newPostManager2 = new PostManager();
		$delPost = $newPostManager2->delete($newPost2);
	}

	public static function deleteComment() {
		$newComment = new Comment([
			'id' => htmlspecialchars($_GET['id']),
		]);

		$newCommManager = new CommentManager();
		$delComment = $newCommManager->delete($newComment);
	}

}


