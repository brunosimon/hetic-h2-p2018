<?php
require ('inc/config.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

//Function that returns every error
function check_login_form($data){

	//Setting Data
	$email        = strtolower($data['email']);

	//Testing email
	//is email valid ?
	if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) return false;

	return true;
}

//is the password provided the same as the one in DB ?
//if Yes : login
//Else, send the error
function try_password(){

	//get the password according to the email
	$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$prepare = $conn->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
	$prepare->bindValue(':mail',$_POST['email']);

	$query = $prepare->execute();
	$user  = $prepare->fetch();

	//check if stored hashed password == hashed given password, login if true
	//
	if($user && $user->password == hash('sha256',$_POST['password'].SALT)){

	    if( $user->active == 1 ){
	    	login($user);	    	
	    }
	    else {
	    	send_login_errors('Compte non activé ! Regardez vos emails');
	    }
	}
	else
	    send_login_errors('Email ou mot de passe incorrect');
}

//Logs in the user,
//use $_session to keep he user auth through pages
function login($user){
	//set SESSION var so user will be identified as logged
	$_SESSION['usr'] = $user->mail;
			
	//if remember me was checked, create a cookie
	if ( isset($_POST['rememberMe']) ) {

		//generate 'true' random identifier to link the auth cookie to an user
		$cstrong = true;
		$rand_cookie_value = bin2hex(openssl_random_pseudo_bytes(16, $cstrong));
		setcookie('auth', $rand_cookie_value, time() + 365*24*3600, null, null, false, true);

		//insert in DB a hash of the identifier (safer than storing the identifier)
		$conn = new PDO('mysql:host='.DB_HOST.';dbport='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$prepare = $conn->prepare('INSERT INTO cookies(id, user) VALUES (:id, :user)');
		$prepare->bindValue(':id',md5($rand_cookie_value));
		$prepare->bindValue(':user',$_SESSION['usr']);
		$prepare->execute();
	}

	//redirect to index.php
	header("Location: ./public_html/index.php");
}

function send_login_errors($msg){
	$_SESSION['errors'] = 'Incorrect email or password';
	header("Location: ./public_html/index.php");
}




if(!empty($_POST)){
	check_login_form($_POST) == true ? try_password() : send_login_errors();
}


