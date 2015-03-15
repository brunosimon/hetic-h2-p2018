<?php 

	require 'inc/config.php';
	echo '<a href="login.php"> connexion </a>';
	echo '<pre>';

	if(!empty($_POST))
	{	
		if($_POST['password'] != $_POST['verif_password'])
		{ 
			echo 'les mot de passe ne correspondent pas'; 
			echo '<pre>';
		} 
		else
		{
			echo'les mots de passes correspondent';
			echo '<pre>';

			$mail = $_GET['mail'];
			$tel  = $_GET['tel_number'];

			$password = hash('sha256',SALT.$_POST['password']);
			$pre = $pdo->prepare("UPDATE users SET password = :password WHERE mail = :mail AND telnumber = : tel_number ");
          	$pre->bindParam(':mail',$mail); 
          	$pre->bindParam(':tel_number',$tel); 
          	$pre->bindParam(':password',$password); 
          	$pre->execute();

          	echo "changement effectués";
		}	
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title> mot de passe pedu </title>
<body>	
	<h1> remplacer mot de passe  </h1>
	<form action="#" method="POST">
		<input type="password" name="password"> <label>Password</label>
		<br>
		<input type="password" name="verif_password"> <label>Retaper votre mot de passe</label>
		<input type="submit">
	</form>
</body>
</head>
</html>
