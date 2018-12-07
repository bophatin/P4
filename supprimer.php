<?php
require_once 'model/Database.php';
require 'controller/AdminController.php';
include("model/User.php");
include("model/UserManager.php");
include("model/Comment.php");
include("model/CommentManager.php");


if (isset($_POST['delete-user'])) {
	AdminController::deleteUser();
	header('Location: admin.php?p=usersView'); 
}


if (isset($_POST['delete-comment'])) {
	AdminController::deleteComment();
	header('Location: admin.php?p=postEditView'); 
}

if (isset($_POST['delete-post'])) {
	AdminController::deletePost();
	header('Location: admin.php?p=postEditView'); 
}