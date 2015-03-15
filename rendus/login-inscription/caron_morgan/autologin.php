<?php

//autolog a user if he has a remember me  cookie
function log_user_from_cookie(){
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$prepare = $conn->prepare('SELECT * FROM cookies WHERE id = :id LIMIT 1');
	$prepare->bindValue(':id',md5($_COOKIE['auth']));
	
	$query = $prepare->execute();
	$user  = $prepare->fetch();			

	if ($user && $user->user){
		$_SESSION['usr'] = $user->user;
		update_auth_cookie();
	}
}

//generates a new cookie to avoid spoofing 
function update_auth_cookie(){

	//generate 'true' random identifier to link the auth cookie to an user
	$cstrong = true;
	$rand_cookie_value = bin2hex(openssl_random_pseudo_bytes(16, $cstrong));
	setcookie('auth', $rand_cookie_value, time() + 365*24*3600, null, null, false, true);

	//insert in DB a hash of the identifier (safer than storing the identifier)
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$prepare = $conn->prepare('UPDATE cookies SET id = :id WHERE user = :user');
	$prepare->bindValue(':id',md5($rand_cookie_value));
	$prepare->bindValue(':user',$_SESSION['usr']);
	$prepare->execute();

}

if(empty($_SESSION['usr'])){
	if (!empty($_COOKIE['auth'])){
		//check if cookie identifier is valid
		log_user_from_cookie();
	}
}