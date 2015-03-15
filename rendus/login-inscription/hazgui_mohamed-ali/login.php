<?php
session_start();

require'inc/config.php';

if(isset($_POST['submit']))
{
	$pseudo   = $_POST['pseudo'];
	$password = $_POST['password'];	

	if(isset($pseudo)&&isset($password))
	{
		$password = hash('sha256',(SALT.$password));
		
		$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
		$prepare->bindValue(':pseudo',$_POST['pseudo']);
		$prepare->execute();
		$pseudo = $prepare->fetch();

		$connect = mysql_connect('localhost','root','root');
		mysql_select_db('bdd');

		$query = mysql_query("SELECT * FROM users WHERE pseudo='$pseudo'&&password='$password'");
		$rows = mysql_num_rows($query);
		if ($rows==1)
		{
			$_SESSION['pseudo'] = $pseudo;
			header ('location:membre.php');
		}
		else echo "Pseudo ou password incorrect";
	}else echo "Veuillez saisir tous les champs";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form class="formulaire" method="POST" action="login.php">
<p> Votre pseudo:</p>
<input type="text" name="pseudo">
<p> Votre password:</p>
<input type="password" name="password"><br/><br/>
<input type="submit" value="Connexion" name="submit">

</form>
</body>
</html>