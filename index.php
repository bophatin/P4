<?php

require 'model/Autoloader.php';
require 'controller/FrontController.php';
Autoloader::register();


if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 'indexView';
}


$page === isset($_GET['page']);

switch($page) {
	case 'indexView':
	require 'view/indexView.php';
	break;

	case 'allPostsView':
	FrontController::getPosts();
	break;

	case 'postView':
	FrontController::getArt();
	break;

	case 'signaler':
	FrontController::signaler();
	break;

	default:
	require 'view/404View.php';
}
