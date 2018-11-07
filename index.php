<?php

require 'model/Autoloader.php';
Autoloader::register();

require 'controller/FrontController.php';



if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'indexView';
}



if ($p === 'indexView') {
	require 'view/indexView.php';
}

if ($p === 'allPostsView') {
	FrontController::getPosts();
}

if ($p === 'postView') {
	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		FrontController::getArt();
	} else {
		die('Erreur');
	}
}

