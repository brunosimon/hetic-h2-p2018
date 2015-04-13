<?php 
	//Connect to DataBase
	require 'inc/config.php';

	//Routing
	$q= !empty($_GET['q'])? $_GET['q'] : '';

	if(empty($q)){
		$view= 'home';
	}
	else if(preg_match('/^connexion\/?$/', $q)){
		$view = 'connexion';
	}
	else if(preg_match('/^inscription\/?$/', $q)){
		$view= 'inscription';
	}
	else{
		$view= 'not-found';
	}
	ob_start();
	include 'views/'.$view.'.php';
	$result= ob_get_clean();

	include 'partials/menu.php';
	echo $result;

