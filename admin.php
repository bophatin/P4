<?php

require 'model/Autoloader.php';
require 'controller/AdminController.php';
Autoloader::register();



if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'logView';
}


$p === isset($_GET['p']);

switch($p) {
	case 'logView':
	require 'view/back/logView.php';
	AdminController::login();
	break;

	case 'usersView':
	AdminController::addUser();
	AdminController::getListUsers();
	AdminController::deleteUser();
	break;

	case 'updateUserView':
	AdminController::getUserId();
	AdminController::update();
	break;

	case 'postEditView':
	AdminController::addPost();
	AdminController::getLists();
	AdminController::deleteEdit();
	break;

	case 'updatePostView':
	AdminController::getPostId();
	AdminController::update();
	break;

}

