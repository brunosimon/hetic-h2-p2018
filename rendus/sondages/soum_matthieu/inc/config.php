<?php
	//Show errors
	error_reporting(E_ALL);
	ini_set('displays_errors', 1);
	$host = "localhost";
	$user  = "root";
	$password =  "root";
	$database1 = "exercice-sondage-soum_matthieu";
	$database2 = "exercice-sondage-soum_matthieu_2";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database1", $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
} catch(PDOException $e) {
    die('Could not connect to the database:' . $e);
}
 
try {
    $pdo2 = new PDO("mysql:host=$host;dbname=$database2", $user, $password);
    $pdo2->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
} catch(PDOException $e) {
    die('Could not connect to the database:' . $e);
}

$pdo->query("SET NAMES UTF8"); // Accepter les accents

session_start();