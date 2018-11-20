<?php

require 'model/Autoloader.php';
Autoloader::register();

require 'controller/AdminController.php';


if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'logView';
}



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


if ($p === 'usersView') {

	if (isset($_POST['pseudo-add'], $_POST['mdp-add'])) {
		if (!empty($_POST['pseudo-add']) AND !empty($_POST['mdp-add'])) {
			AdminController::addUser();
		} else {
			echo "Veuillez remplir tous les champs";
		}
	}

	AdminController::getListUsers();

	if (isset($_GET['id'])) {
		AdminController::deleteUser();
	}

}