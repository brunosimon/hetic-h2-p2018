<?php 
	error_reporting(E_ALL);
	ini_set('display_erros', 1);

	// Connexion variables
	define('DB_HOST','localhost');
	define('DB_NAME','exercice-login-richard_stephen');
	define('DB_USER','root');
	// Define to '' with Xampp
	define('DB_PASS','root');
	define('SALT','n)ç!)çèn&é)çyrè!cv');

	try
	{
	    // Try to connect to database
	    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

	    // Set fetch mode to object
	    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	}
	catch (Exception $e)
	{
	    // Failed to connect
	    die('Could not connect');
	}

	require_once('lib/auth.php');

	// Start session
	session_start();
	