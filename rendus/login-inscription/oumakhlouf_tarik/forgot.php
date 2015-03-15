<?php

require_once("config.php");

if(isset($_POST['mail']))
{
	$mail = $_POST['mail'];
	
	$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$result = $db->query("SELECT * FROM users WHERE mail = '$mail'");
	$user = $result->fetch_assoc();

	if (sizeof($user) != 0) 
	{
		$message = "Un email a bien été envoyé.";
	}
	else 
	{
		$message = "Cet e-mail n'éxiste pas";
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
	<h1>Mot de passe oublié</h1>
	<form action="#" method="POST">
		<label for="mail">Mail :</label>
		<input type="text" name="mail" id="mail">
		<br>
		<input type="submit">
	</form>
	<?php if (isset($message)) echo '<p>' . $message . '</p>'; ?>
	<p><a href="login.php">Connexion</a></p>
</body>
</html>