<?php

require 'inc/config.php';

//Check Errors
$errors = [];

if(!empty($_POST)){

	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
	$prepare->bindValue(':mail',$_POST['mail']);

	$prepare->execute();
	$user = $prepare->fetch();

	if(!$user){
		$errors['user'] = "User not found";
		session_start();
		$_SESSION['errors'] = $errors;
		header('Location: index.php');
		exit;
	}
	else{
		if($user->password == hash('sha256',SALT.$_POST['password'])){
			$_SESSION['name'] = $user->name;
			$_SESSION['mail'] = $user->mail;
			header('Location: home.php');
			exit;
		}
		else{
			$errors['password'] = "Wrong password";
			session_start();
			$_SESSION['errors'] = $errors;
			header('Location: index.php');
			exit;
		}
	}
}
