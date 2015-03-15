<?php
	require 'config.php';
	if(isset($_POST["submit"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];

	$result = $pdo->prepare('INSERT INTO login (username,password) VALUES (:username,:password)');
		
	$result->bindValue(':username', $_POST['username']);
	$result->bindValue(':password', hash('sha256',SALT.$_POST['password']));
	$result->execute();


	if($result){
	echo "Congrats, votre compte a été créee";
	} else {
	echo "Echec!";
	}

	} else {
	echo "Ce nom d'utilisateur existe deja! Essayez avec un autre.";
	}

} else {
	echo "Tout les champs sont requis!";
}

?>
<!doctype html>
<html>
<head>
<title>Register</title>
</head>
<body>

<p><a href="register.php">Inscription</a> | <a href="login.php">Connexion</a></p>
<h3>Formulaire d'inscription</h3>
<form action="" method="POST">
Username: <input type="text" name="username"><br />
Password: <input type="password" name="password"><br />	
<input type="submit" value="Register" name="submit" />
</form>
</body>
</html>