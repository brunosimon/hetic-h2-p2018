<?php
	
	session_start();

		$name 			 = $_POST['name'];
		$mail 			 = $_POST['mail'];
		$password 		 = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];

	require 'inc/config.php';

	  if (($_SESSION['mail']) != $mail && ($_SESSION['password']) != $password) {
		header ('Location: index.php');
		
	}else{
		echo 'Bienvenue dans votre espace membre';
		echo '<pre>';
		print_r($_SESSION['$name']);
		echo '</pre>';
	}
?>	
	



