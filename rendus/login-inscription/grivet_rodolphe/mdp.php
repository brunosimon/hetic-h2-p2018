<?php 
	include 'inc/config.php';
	if(!empty($_POST))
	{
		$prepare = $pdo->prepare('SELECT mail FROM users WHERE mail = :mail');
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();
		$result_mail = $prepare->fetch(PDO::FETCH_ASSOC);

		if(empty($result_mail))
		{
			echo 'Cet Email nexiste pas';
		}
		else if(!empty($result_mail))
		{
			echo 'Un email va vous êtres envoyé afin de réinitialiser votre mdp';
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mot de passe oublié</title>
</head>
<body>
	<h1>Mot de passe oublié [TEST]</h1>
	<p>Rentrer votre adresse email afin de recevoir vore mot de passe</p>
	<form action="#" method="POST">
		<label for="mail">Mail :</label>
		<input type="text" name="mail" id="mail">
		<br>
		<input type="submit">
	</form>
	<h3><a href="index.php">Retour Index</a></h3>
</body>
</html>