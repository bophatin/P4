<?php

require 'model/Autoloader.php';
Autoloader::register();

require 'controller/FrontController.php';


if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'indexView';
}


// HOME PAGE

if ($p === 'indexView') {
	require 'view/indexView.php';
}


// PAGE TOUS LES ARTICLES

if ($p === 'allPostsView') {
	FrontController::getPosts();
}


// PAGE ARTICLE

if ($p === 'postView') {

	if(isset($_POST['send-comment'])) {
		if (isset($_POST['name-form'], $_POST['comment-form'])) {
			if (!empty($_POST['name-form']) AND !empty($_POST['comment-form'])) {
				FrontController::addComment();
				header('Location: index.php?p=allPostsView'); 
			} else {
				echo "Veuillez remplir tous les champs";
			}
		}
	} 

	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		FrontController::getArt();
	} else {
		die('Erreur'); // Mettre page 404
	}

}


