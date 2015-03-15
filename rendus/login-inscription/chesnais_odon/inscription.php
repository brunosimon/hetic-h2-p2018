<?php

	require 'inc/config.php';

	if(!empty($_POST))
	{

		if (empty($_POST['pseudo']))
		{
 			echo "Vous n'avez pas saisi votre pseudo <br/>";
 		}
 		else if (empty($_POST['mail']))
		{
 			echo "Vous n'avez pas saisi votre e-mail <br/>";
 		}
 		else if (empty($_POST['password']))
		{
 			echo "Vous n'avez pas saisi votre mot de passe <br/>";
 		}
 		else if (empty($_POST['sexe']))
		{
 			echo "Vous n'avez pas renseigné votre sexe <br/>";
 		}
 		else if (empty($_POST['age']))
		{
 			echo "Vous n'avez pas renseigné votre âge <br/>";
 		}
 		else if ($_POST['password'] != $_POST['password2'])
		{
			echo "Les deux mots de passe ne sont pas identiques <br/>";
   		}
   		else if (!is_numeric($_POST['age']))
		{
 			echo "Veuillez renseigner un âge valide <br/>";
 		}
 		else if (!preg_match("#@#",$_POST['mail']))
 		{
 			echo "Veuillez renseigner une adresse mail valide";
 		}

		else {
		$prepare = $pdo->prepare('INSERT INTO users (pseudo,mail,password,sexe,age) VALUES (:pseudo,:mail,:password,:sexe,:age)');

		$prepare->bindValue(':pseudo',$_POST['pseudo']);
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
		$prepare->bindValue(':sexe',$_POST['sexe']);
		$prepare->bindValue(':age',$_POST['age']);

		$prepare->execute();
		
		echo "Félicitations " .$_POST['pseudo']. ", vous êtes maintenant inscrit sur notre site !";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>

	<h1>Inscription</h1>

	<form action="#" method="POST">
		<label>Pseudo :</label>
		<input type="text" name="pseudo">
		<br> <br>
		<label>E-Mail :</label>
		<input type="text" name="mail">
		<br> <br>
		<label>Mot de passe :</label>
		<input type="password" name="password">
		<br> <br>
		<label>Réécrivez le mot de passe :</label>
		<input type="password" name="password2">
		<br> <br>
		<label>Sexe :</label>
		<input type="radio" name="sexe" value="M">M
		<input type="radio" name="sexe" value="F">F
		<br> <br>
		<label>Âge :</label>
		<input type="text" name="age">
		<br> <br>
		<input type="submit">
	</form>

</body>
</html>