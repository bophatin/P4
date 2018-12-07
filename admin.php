<?php

require 'model/Autoloader.php';
Autoloader::register();

require 'controller/AdminController.php';


if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'logView';
}


// PAGE LOG

if ($p === 'logView') {
	require 'view/back/logView.php';

	if(isset($_POST['send-log'])) {
		if (isset($_POST['pseudo-log'], $_POST['mdp-log'])) {
			if(!empty($_POST['pseudo-log']) && !empty($_POST['mdp-log'])) {

				/*$pseudolog = htmlspecialchars($_POST['pseudo-log']);
				$mdplog = htmlspecialchars($_POST['mdp-log']);*/

				AdminController::login();
				header('Location:admin.php?p=postEditView');
			} else {
				echo 'Vous devez remplir tous les champs afin de pouvoir vous connecter';
			}
		} else {
			echo "Erreur";
		}
	}
}


// PAGE USERS 

if ($p === 'usersView') {

	if(isset($_POST['create'])) {
		if (isset($_POST['pseudo-add'], $_POST['mdp-add'])) {
			if (!empty($_POST['pseudo-add']) AND !empty($_POST['mdp-add'])) {
				AdminController::addUser();
				header('Location: admin.php?p=usersView'); 
			} else {
				echo "Veuillez remplir tous les champs";
			}
		}
	} 

	AdminController::getListUsers();
}


// PAGE UPDATE USER

if ($p === 'updateUserView') {

	if (isset($_GET['id'])) {
		AdminController::getUserId();
	}

	if(isset($_POST['save'])) {
		if (isset($_POST['pseudo-new'], $_POST['mdp-new'])) {
			AdminController::updateUser();
			header('Location: admin.php?p=usersView'); 
		} 
	}
}



// PAGE UPDATE POST

if ($p === 'updatePostView') {

	if (isset($_GET['id'])) {
		AdminController::getPostId();
	}

	if(isset($_POST['save-post'])) {
		if (isset($_POST['title-new'], $_POST['content-new'])) {
			AdminController::updatePost();
			header('Location: admin.php?p=postEditView'); 
		} 
	}
}


// PAGE POST

if ($p === 'postEditView') {

	if(isset($_POST['addPost'])) {
		if (isset($_POST['title'], $_POST['content'])) {
			if (!empty($_POST['title']) AND !empty($_POST['content'])) {
				AdminController::addPost();
				header('Location: admin.php?p=postEditView'); 
			} else {
				echo "Veuillez remplir tous les champs";
			}
		}
	} 

	AdminController::getLists();
}