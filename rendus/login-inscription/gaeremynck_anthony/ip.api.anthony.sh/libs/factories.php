<?php
// On créer la variable des routes de l'API
$router = new Zaphpa_Router();

try
{
	$db = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME.'', DB_USER, DB_PASSWORD);
	
	// i don't like this... (Problématique pour les tableaux multidimensionnels dans certains cas...)
	// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
	// Impossible de se co à la BDD
	display_msg('An error was occured, please retry later', 'ERROR');
}
?>