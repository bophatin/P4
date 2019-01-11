<?php

require 'model/Autoloader.php';
require 'controller/AdminController.php';
Autoloader::register();



if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 'logView';
}


$page === isset($_GET['page']);

switch($page) {
	case 'logView':
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

	case 'logout':
	AdminController::logout();
	break;
}

