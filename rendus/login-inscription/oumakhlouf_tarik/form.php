<?php

function validateForm($username, $mail, $password, $repeatpassword)
{
	if (!$username || !$mail || !$password || !$repeatpassword)
		return array("error" => true, "message" => "Veuillez saisir tout les champs");
	
	if ($password != $repeatpassword) 
		return array("error" => true, "message" => "Les mots de passe doivent etre identiques");
	
	$mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
	
	if(filter_var($mail, FILTER_VALIDATE_EMAIL) === false)
		return array("error" => true, "message" => "L'e-mail est invalide");

	$salt = uniqid(mt_rand(), true);

	$password = hash('sha256', $salt . $password);
	
	$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$result = $db->query("SELECT * FROM users WHERE username ='$username' OR mail ='$mail'");
	$rows = $result->fetch_array(MYSQLI_NUM);
	
	if (sizeof($rows) != 0)
		return array("error" => true, "message" => "L'e-mail ou le pseudo est déjà utilisé");

	$sql = "INSERT INTO users (username, password, mail, salt) VALUES('$username','$password','$mail', '$salt')";

	if ($db->query($sql) === TRUE) 
		return array("error" => false, "message" => "Bravo, vous êtes bien inscrit ! <a href='login.php'>Connectez-vous</a>");
	else
		return array("error" => true, "message" => "Erreur inconnue, veuillez réessayer.");
}