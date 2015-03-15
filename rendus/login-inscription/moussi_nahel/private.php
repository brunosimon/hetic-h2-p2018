<?php 

//SESSION START 
session_start();
require('auth.php');

//Si une session est reconnu alors ne rien faire
if(Auth::islog()){
 
}else{
    header('Location:index.php'); //Sinon rediriger vers la page d'acceuil
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Privée</title>
</head>
<body>
	<h1> Private page !  </h1>
	<a href="logout.php">Se déconnecter</a>
	
</body>
</html>