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
	break;

	case 'updateUserView':
	AdminController::getUserId();
	AdminController::updateUser();
	break;

	case 'postEditView':
	AdminController::addPost();
	AdminController::getLists();
	break;

	case 'updatePostView':
	AdminController::getPostId();
	AdminController::updatePost();
	break;

}

