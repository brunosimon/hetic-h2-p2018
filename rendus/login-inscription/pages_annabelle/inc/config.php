<?php

	//show errors
	error_reporting(E_ALL);
	ini_set('display_errors',1);

	//connexion variables
	define('DB_HOST','localhost');
	define('DB_NAME','exercice-login-pages_annabelle');
	define('DB_USER','root');
	define('DB_PASS','root');
	define('SALT','kfrho652hkvgè'); //on rajoute un chaine de caractère aleatoire avant notre mdp toto pr le rendre plus unique (en plus du hashage, permet de pas le voir sur une rainbow table)

	try
	{
		//try to connect to database
		$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER,DB_PASS);

		//set fetch mode to object
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	}
	catch (Exception $e)
	{
		//failed to connect
		die('Could not connect');
	}


	





