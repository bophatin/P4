<?php

require 'model/Autoloader.php';
Autoloader::register();


if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'indexView';
}


$db = new Database('blog');


if ($p === 'allPostsView') {
	require 'view/allPostsView.php';
	require 'controller/Frontcontroller.php';
	Frontcontroller::getPosts();
}

if ($p === 'indexView') {
	require 'view/indexView.php';
}

if ($p === 'postView') {
	require 'view/postView.php';
}

