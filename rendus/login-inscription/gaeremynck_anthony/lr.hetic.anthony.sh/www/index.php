<?php
require_once('../requires.php');

if(isset($_GET['cie'])) {
	// Mail tracking
	$rqt = $db->prepare('UPDATE sent_mail SET clicked = "1", click_date = NOW() WHERE id_sent_mail = :id_sent_mail');
	$rqt->execute(array('id_sent_mail' => $_GET['cie']));
}

try {
	$router->route();
} catch (Zaphpa_InvalidPathException $ex) {
	// Si l'url demandé est incorrect	
	page_not_found();
}
?>