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
		$id = htmlspecialchars($_GET['id']);

		$newUser = new UserManager();
		$delUser = $newUser->delete($id);
		require 'view/back/usersView.php';
	}
}