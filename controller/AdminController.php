<?php

class AdminController {

	public static function login() {

		if(isset($_POST['send-log'])) {
			if (isset($_POST['pseudo-log'], $_POST['mdp-log'])) {
				if(!empty($_POST['pseudo-log']) AND !empty($_POST['mdp-log'])) {
					$name = htmlspecialchars($_POST['pseudo-log']);
					$pwd = htmlspecialchars($_POST['mdp-log']);
			
					$us = new User([
						'name_admin' => $name,
						'password' => $pwd
					]);
				
					$um = new UserManager();
					$user = $um->logUser($name);
					
					$mdp = $user->password();
					$validPwd = password_verify($pwd, $mdp);

					if($validPwd) {
						header('Location:admin.php?p=postEditView');
					} else {
						echo "Identifiants incorrects";
					}
				} else {
					echo 'Vous devez remplir tous les champs afin de pouvoir vous connecter';
				}
			} else {
				echo "Erreur";
			}
		}
	}


	// USERS

	public static function addUser() {
		if(isset($_POST['create'])) {
			if (isset($_POST['pseudo-add'], $_POST['mdp-add'])) {
				if (!empty($_POST['pseudo-add']) AND !empty($_POST['mdp-add'])) {
					$newUser = new User([
						'name_admin' => htmlspecialchars($_POST['pseudo-add']),
						'password' => password_hash(htmlspecialchars($_POST['mdp-add']), PASSWORD_DEFAULT)
					]);

					$addUserManager = new UserManager();
					$addUser = $addUserManager->add($newUser);
					header('Location: admin.php?p=usersView'); 
				} else {
					echo "Veuillez remplir tous les champs";
				}
			}
		} 
	}

	public static function getListUsers() {
		$newListManager = new UserManager();
		$usersList = $newListManager->getUsers();
		require 'view/back/usersView.php';
	}


	public static function getUserId() {
		if (isset($_GET['id'])) {
			$id = htmlspecialchars(($_GET['id']));

			$getUserManager = new UserManager();
			$getUser = $getUserManager->get($id);
			require 'view/back/updateUserView.php';
		}
	}

	public static function updateUser() {
		if(isset($_POST['save'])) {
			if (isset($_POST['pseudo-new'], $_POST['mdp-new'])) {
				$newUpUser = new User([
					'name_admin' => htmlspecialchars($_POST['pseudo-new']),
					'password' => password_hash(htmlspecialchars($_POST['mdp-new']), PASSWORD_DEFAULT),
					'id' => htmlspecialchars($_GET['id'])
				]);

				$newUpUserManager = new UserManager();
				$UpdateUser = $newUpUserManager->update($newUpUser);
				header('Location: admin.php?p=usersView'); 
			} 
		}
	}

	public static function deleteUser() {
		$newUser2 = new User([
			'id' => htmlspecialchars($_GET['id'])
		]);

		$newUserManager = new UserManager();
		$delUser = $newUserManager->delete($newUser2);
	}



	// EDIT POSTS

	public static function getLists() {
		$list = new PostManager();
		$posts = $list->getPost();

		$commManager = new CommentManager();
		$comments = $commManager->getComments();
		require 'view/back/postEditView.php';
	}

	public static function getPostId() {
		if (isset($_GET['id'])) {
			$id = htmlspecialchars(($_GET['id']));

			$getPostManager = new PostManager();
			$getPost = $getPostManager->get($id);
			require 'view/back/updatePostView.php';
		}
	}

	public static function addPost() {
		if(isset($_POST['addPost'])) {
			if (isset($_POST['title'], $_POST['content'])) {
				if (!empty($_POST['title']) AND !empty($_POST['content'])) {
					$newPost = new Post([
						'title' => htmlspecialchars($_POST['title']),
						'content_post' => htmlspecialchars($_POST['content'])
					]);

					$newPostManager = new PostManager();
					$addNewPost = $newPostManager->add($newPost);
					header('Location: admin.php?p=postEditView'); 
				} else {
					echo "Veuillez remplir tous les champs";
				}
			}
		}
	}

	public static function updatePost() {
		if(isset($_POST['save-post'])) {
			if (isset($_POST['title-new'], $_POST['content-new'])) {
				$newUpPost = new Post([
					'title' => htmlspecialchars($_POST['title-new']),
					'content_post' => htmlspecialchars($_POST['content-new']),
					'id' => htmlspecialchars($_GET['id'])
				]);

				$newUpManager = new PostManager();
				$updateNewPost = $newUpManager->update($newUpPost);
				header('Location: admin.php?p=postEditView'); 
			} 
		}
	}

	public static function deletePost() {
		$newPost2 = new Post([
			'id' => htmlspecialchars($_GET['id']),
		]);

		$newPostManager2 = new PostManager();
		$delPost = $newPostManager2->delete($newPost2);
	}



	// EDIT COMMENTS

	public static function deleteComment() {
		$newComment = new Comment([
			'id' => htmlspecialchars($_GET['id']),
		]);

		$newCommManager = new CommentManager();
		$delComment = $newCommManager->delete($newComment);
	}

}


