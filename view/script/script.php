<?php
require_once '../../model/Database.php';
require '../../model/Comment.php';
require '../../model/CommentManager.php';


if(isset($_GET['id']) AND !empty($_GET['id'])) {

	$id = htmlspecialchars($_GET['id']);
	$signaler = '';
	$signaler++;
	

	$newSignComm = new Comment([
		'signaler' => $signaler,
		'id' => htmlspecialchars($_GET['id'])
	]);

	$NSM = new CommentManager();
	$upSignaler = $NSM->upSignaler($newSignComm);

	$alert = "<script> alert('Votre commentaire a bien été signalé') </script>";
	echo "$alert";


	header('Location: ' .$_SERVER['HTTP_REFERER']);
}



	
		
