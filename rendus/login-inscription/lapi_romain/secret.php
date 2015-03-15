<?php
	session_start();
	if (isset($_SESSION['connect'])){ //On vérifie que le variable existe.
       $connect=$_SESSION['connect']; //On récupère la valeur de la variable de session.
	}
	else{
        $connect=0; //Sinon on donne la valeur 0.
	}
       
	if ($connect == "1") { // Si le visiteur s'est identifié, on affiche la page
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Page secrète</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>Vous avez réussi à accéder à cette page</h1>
		<img src="http://media.giphy.com/media/14xFtRMKKza7WU/giphy.gif" alt="GG">
		<form action="deconnexion.php" method="post">
		<input type="submit" value="Déconnexion"/>
	</body>
</html>
<?php 	
	} 
// Sinon, on le redirige vers la page login
	else  echo "<script language='Javascript'>document.location='login.php'</script>"; 
?>


