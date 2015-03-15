
<?php
require 'config.php';
header("Location: member.php");
if(isset($_POST["submit"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];

	
	$prepare = $pdo->prepare('SELECT * FROM login WHERE username = :username LIMIT 1');
		
	$prepare->bindValue(':username', $_POST['username']);

	$prepare->execute();



	// Probleme de redirecetion vers la page membre, pas trouvé la condition if qu'il faut
	// session_start();
	// $_SESSION['sess_user']=$user;

	//  Redirection du navigateur vers la page membre 
	// header("Location: member.php");
	
}
else {
	echo "Tous les champs sont requis!";
}
}

?>
<!doctype html>
<html>
<head>
<title>Connexion</title>
</head>
<body>

<p><a href="register.php">Inscription</a> | <a href="login.php">Connexion</a></p>
<h3>Connexion au compte utilisateur</h3>
<form action="" method="POST">
Username: <input type="text" name="username"><br />
Password: <input type="password" name="password"><br />	
<input type="submit" value="Se connecter" name="submit" />
</form>
</body>
</html>