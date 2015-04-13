<?php
require 'config.php';

// create curl resource 
$ch = curl_init(); 

function readAll () {

	global $pdo;

	$query = $pdo->query('SELECT * FROM users ORDER BY RAND() LIMIT 0, 24');

	$data = $query->fetchAll();

	return $data;
}

function readOpenGraph ($id) {

	global $ch;

	curl_setopt($ch, CURLOPT_URL, "http://graph.facebook.com/?id=".$id); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$data = curl_exec($ch); 

	return json_decode($data);
}

function pollStudent ($id) {

	global $pdo;

	$prepare = $pdo->prepare('UPDATE users SET votes = votes + 1 WHERE id = :id');
	$prepare->bindValue(':id', $id);

	$prepare->execute();
	
	echo true;

}

// function getRank () {

// 	global $pdo;

// 	$query = $pdo->query('SELECT * FROM users ORDER BY votes DESC LIMIT 0, 24');

// 	$data = $query->fetchAll();

// 	echo json_encode($data);
// }

function getRank () {

	global $pdo;

	$query = $pdo->query('SELECT * FROM users ORDER BY votes DESC LIMIT 0, 24');

	$data = $query->fetchAll();

	return $data;
}

if (!empty($_POST['action']) && !empty($_POST)) {

	$action = $_POST['action'];

	switch ($action) {
		case 'poll':
			pollStudent($_POST['student_id']);
			break;
		case 'rank':
			getRank();
			break;
		
		default:
			return false;
			break;
	}
}