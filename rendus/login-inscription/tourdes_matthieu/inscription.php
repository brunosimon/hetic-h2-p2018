<?php
//Connect to DB
require 'inc/config.php';

//Check Errors
$errors = [];

//Check Name
if(!array_key_exists('name', $_POST) || $_POST['name'] == ''){
	$errors['name'] = "You did not inform your name";
}

//Check Age
if(!array_key_exists('age', $_POST) || $_POST['age'] == '' || $_POST['age']>150 || $_POST['age']<1){
	$errors['age'] = "You did not inform a valid age";
}

//Check mail
if(!array_key_exists('mail', $_POST) || $_POST['mail'] == '' || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
	$errors['email'] = "You did not inform a valid mail";
}

$check = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
$check->bindValue(':mail',$_POST['mail']);
$check->execute();
$result = $check->fetch();
if($result){
	$errors['email'] = "Mail already used";
}

//Check password
if(!array_key_exists('password', $_POST) || $_POST['password'] == '' || ctype_digit($_POST['password']) || ctype_alpha($_POST['password']) ){
	$errors['password'] = "You did not inform a valid password. You need at least one number and one letter.";
}

if(!array_key_exists('password_check', $_POST) || $_POST['password_check'] == '' || $_POST['password_check'] !== $_POST['password']){
	$errors['password_check'] = "The second password differ from the first one.";
}


//Errors found + redirection
if(!empty($errors)){
	// session_start();
	$_SESSION['errors'] = $errors;
	header('Location: index.php');
	exit;
}

//Errors not found + redirection
else{
	// session_start();
	$_SESSION['thanks'] = 'Thank you for your inscription !';
	$prepare = $pdo->prepare('INSERT INTO users (mail,password,name,age) VALUES (:mail,:password,:name,:age)');
	$prepare->bindValue(':mail',$_POST['mail']);
	$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
	$prepare->bindValue(':name',$_POST['name']);
	$prepare->bindValue(':age',$_POST['age']);


	$prepare->execute();
	header('Location: index.php');
	exit;
}


/*
Énoncé
Seul, vous devez développer un formulaire d'inscription et un formulaire de login permettant d'accéder à une page privée.
Si le visiteur tente d'accéder à la page sans s'être connecté, il sera automatiquement redirigé vers la page de login.
Ces formulaires devront intégrer un maximum des features suivantes ainsi que toutes les features que vous auriez pu imaginer. 

Exemple de features
-Gestion des erreurs du formulaire (done)
-Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux (done)
-Tester la complexité du mot de passe (done)
-Tester si le mail n'a pas déjà été enregistré dans la BDD (done)
-Plus de champs à l'inscription (done)
-Envoyer un mail de confirmation d'inscription
-Envoyer un mail contenant un lien permettant de confirmer l'inscription
-Bouton de déconnexion sur la page privée (done)
-Système "Mot de passe oublié"
-Système "Se souvenir de moi"
-Captcha
-Limiter le nombre de tentatives
-Mots de passe sécurisés (hash et salt minimum) (done)

-supprimer compte (done)

*/