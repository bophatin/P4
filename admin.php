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

	if(isset($_POST['envoyer'])) {

		if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) {
			AdminController::login();
		} else {
			echo "Vous devez remplir tous les champs afin de pouvoir vous connecter";
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


	if (isset($_GET['id'])) {
		AdminController::deleteUser(); 
	}

	if(isset($_POST['update'])) {
		if (isset($_GET['name_admin'])) {
			AdminController::getUserId();
		} else {
			die('Erreur'); 
		}
	}

	if(isset($_POST['save'])) {
		if (isset($_POST['pseudo'], $_POST['mdp'])) {
			AdminController::updateUser();
			header('Location: admin.php?p=usersView'); 
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

	if (isset($_GET['id'])) {
		AdminController::deleteComment(); 
	}
}













