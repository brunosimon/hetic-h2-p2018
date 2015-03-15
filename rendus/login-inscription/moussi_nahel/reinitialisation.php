<?php 

require_once 'inc/config.php';

	

	

//Si on a bien une valeur GET dans l'URL,
	if(!empty($_GET)){
			$email = $_GET['email'];
	$req_email = $pdo->prepare('SELECT email FROM nm_devoir1 WHERE email = :email LIMIT 1');
	$req_email->execute(['email'=> $_GET['email']]);

		if($req_email -> fetch()){
			if(!empty($_POST)){
			$n_password = $_POST['n_password'];
			$v= array('email'=>$email, 'n_password'=>$n_password);

			//On active son compte
			$sql='UPDATE nm_devoir1 SET password = :n_password WHERE email = :email';
			$req = $pdo -> prepare($sql);
			$req->execute($v);
		}
	}
}
/*
	if(!empty($_GET)){
		$email = $_GET['email'];
		if(!empty($_POST)){

	$n_password = sha1($_POST['n_password']);

	$req_email = $pdo->prepare('SELECT email FROM nm_devoir1 WHERE email = :email LIMIT 1');
	$req_email->execute(['email'=> $_GET['email']]);

		//Si il y'a bon une requête avec un utilisateur existant
		if ($req_email -> fetch()){


		$v = array('email' => $email,'n_password'=> $n_password);
		$sql = 'UPDATE nm_devoir1 SET password = '$n_password' WHERE email = '$email'';
		$req = $pdo ->prepare($sql);
		$req -> execute($v);
	}
}
}
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
</head>
<body>
	<h1>Reinitialisation du mdp </h1>
		<form action="reinitialisation.php" method="POST">

			<input type="password" name="n_password" >
			<label for="n_password">Password</label>
			<br>

			<input type="submit" value="Re-initialiser">
		</form>

	
</body>
</html>