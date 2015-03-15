<?php 
	// Show errors 
	error_reporting(E_ALL);
	ini_set('display_errors',1);

// Variables connection
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-pereira_cedric');
define('DB_USER','root');
define('DB_PASS','root');
define('SALT', '8Qqudè!è§S76D');
define('WRONG_PWD_MAX', 5);

require_once 'phpmailer/class.phpmailer.php';

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
    die('Cound not connect');
}

session_start();

if(!isset($_SESSION['id_users']) && isset($_COOKIE['remember'])) {
	$data = explode(':', $_COOKIE['remember']);
	$id_users = $data[0];
	$identifier = $data[1];
	$token = $data[2];
	
	$prepare = $pdo->prepare('SELECT * FROM users_tokens WHERE id_users = :id_users AND identifier = :identifier AND token = :token');
	$prepare->bindValue(':id_users', $id_users);
	$prepare->bindValue(':identifier', $identifier);
	$prepare->bindValue(':token', $token);
	$prepare->execute();
	
	$data = $prepare->fetch();
	
	if(isset($data->id_users_tokens)) {
		$time = time() + 3600 * 24 * 30;
		setcookie('remember', $id_users.':'.$identifier.':'.$token, $time, '/');
		
		$prepare = $pdo->prepare('SELECT * FROM users WHERE id_users = :id_users');
		$prepare->bindValue(':id_users', $id_users);
		$prepare->execute();
		$user = $prepare->fetch();
		
		$_SESSION['id_users'] = $id_users;
		$_SESSION['email'] = $user->email;
	}
}