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
						session_start();
						$_SESSION['pseudo-log'] = $_POST['pseudo-log'];
						$_SESSION['mdp-log'] = $_POST['mdp-log'];
						header('Location:admin.php?page=postEditView');
					} else {
						$error = "Identifiants incorrects"; 
					}
				} else {
					$error = "Tous les champs doivent être complétés !";
				}
			} else {
				require 'view/404View.php';
			}
		}
		require 'view/back/logView.php';
	}

	public static function logout() {
		session_start();
		$_SESSION = array();

		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		session_destroy();
		header('Location: admin.php');
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
					header('Location: admin.php?page=usersView'); 
				} else {
					echo  "Tous les champs doivent être complétés !";
				}
			} else {
				require 'view/404View.php';
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
		} else {
			require 'view/404View.php';
		}
	}

	public static function update() {
		if(isset($_POST['update'])) {
			if (isset($_POST['pseudo-new'], $_POST['mdp-new'])) {
				$newUpUser = new User([
					'name_admin' => htmlspecialchars($_POST['pseudo-new']),
					'password' => password_hash(htmlspecialchars($_POST['mdp-new']), PASSWORD_DEFAULT),
					'id' => htmlspecialchars($_GET['id'])
				]);

				$newUpUserManager = new UserManager();
				$UpdateUser = $newUpUserManager->update($newUpUser);
				header('Location: admin.php?page=usersView'); 
			} else {
				require 'view/404View.php';
			}
		}

		if(isset($_POST['save-post'])) {
			if (isset($_POST['title-new'], $_POST['content-new'])) {
				$newUpPost = new Post([
					'title' => $_POST['title-new'],
					'content_post' => $_POST['content-new'],
					'id' => $_GET['id']
				]);

				$newUpManager = new PostManager();
				$updateNewPost = $newUpManager->update($newUpPost);
				header('Location: admin.php?page=postEditView'); 
			} else {
				require 'view/404View.php';
			}
		}
	}

	public static function deleteUser() {
		if (isset($_POST['delete-user'])) {
			$newUser2 = new User([
				'id' => htmlspecialchars($_GET['id'])
			]);

			$newUserManager = new UserManager();
			$delUser = $newUserManager->delete($newUser2);
			header('Location: admin.php?page=usersView');
		}
	}


	// EDIT POSTS
	public static function getLists() {
		// Liste des posts
		$list = new PostManager();
		$posts = $list->getPost();

		// Liste des comments
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
		} else {
			require 'view/404View.php';
		}
	}

	public static function addPost() {
		if(isset($_POST['addPost'])) {
			if (isset($_POST['title'], $_POST['content'])) {
				if (!empty($_POST['title']) AND !empty($_POST['content'])) {
					$newPost = new Post([
						'title' => $_POST['title'],
						'content_post' => $_POST['content']
					]);

					$newPostManager = new PostManager();
					$addNewPost = $newPostManager->add($newPost);
					header('Location: admin.php?page=postEditView'); 
				} else {
					echo "<script> alert('Veuillez remplir tous les champs') </script>";
				}
			} else {
				require 'view/404View.php';
			}
		}
	}



	public static function deleteEdit() {
		if (isset($_POST['delete-post'])) {
			$newPost2 = new Post([
				'id' => htmlspecialchars($_GET['id']),
			]);

			$newPostManager2 = new PostManager();
			$delPost = $newPostManager2->delete($newPost2);
			header('Location: admin.php?page=postEditView'); 
		}

		if (isset($_POST['delete-comment'])) {
			$newComment = new Comment([
				'id' => htmlspecialchars($_GET['id']),
			]);

			$newCommManager = new CommentManager();
			$delComment = $newCommManager->delete($newComment);
		}
	}
}


