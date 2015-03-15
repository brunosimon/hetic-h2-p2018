<?php
require_once('../requires.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

try {
	$router->route();
} catch (Zaphpa_InvalidPathException $ex) {
	// Si l'url demandé est incorrect	
	display_msg('not found', 'ERROR');
}
?>