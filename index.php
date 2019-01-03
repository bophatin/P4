<?php

require 'model/Autoloader.php';
require 'controller/FrontController.php';
Autoloader::register();


if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'indexView';
}


$p === isset($_GET['p']);

switch($p) {
	case 'indexView':
	require 'view/indexView.php';
	break;

	case 'allPostsView':
	FrontController::getPosts();
	break;

	case 'postView':
	FrontController::getArt();
	break;

	default:
	require 'view/404View.php';
}
