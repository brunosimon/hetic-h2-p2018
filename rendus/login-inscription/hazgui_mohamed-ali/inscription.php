<?php
if (isset($_POST['submit']))
{
	$family         = htmlentities(trim($_POST['family']));
	$surname        = htmlentities(trim($_POST['surname']));
	$pseudo         = htmlentities(trim($_POST['pseudo'])); // pseudo
	$age            = htmlentities(trim($_POST['age']));
	$email          = htmlentities(trim($_POST['email']));
	$password       = htmlentities(trim($_POST['password']));	

	$repeatpassword = htmlentities(trim($_POST['repeatpassword']));


	if(isset($pseudo)&&isset($password)&&isset($repeatpassword)){	
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
			if($password == $repeatpassword){
				$password = hash('sha256',(SALT.$password));
			
					require'inc/config.php';
					
					$prepare = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
					$prepare->bindValue(':pseudo',$_POST['pseudo']);
					$prepare->execute();
					$pseudo = $prepare->fetch();
			
					if(!isset($pseudo->pseudo)){
					
						$prepare = $pdo->prepare('INSERT INTO users(family,surname,pseudo,age,email,password) VALUES (:family,:surname,:pseudo,:age,:email,:password)');
						$prepare->bindValue(':family',$family);
						$prepare->bindValue(':surname',$surname);
						$prepare->bindValue(':pseudo',$pseudo);
						$prepare->bindValue(':age',$age);
						$prepare->bindValue(':email',$email);
						$prepare->bindValue(':password',$password);
						$prepare->execute();

						die("Inscription terminée <a href='membre.php'> Connectez vous </a>");

					} else {
						echo "Votre nom est déjà utilisé";
					}

				}
				else echo "Les deux passwords doivent être identiques";
		}
		else{
			echo "Veuillez remplir tous les champs";
			echo isset($password);
			echo isset($email);
			echo isset($pseudo);
		}
		
}else echo 'Cet email a un format non adapté.';	
}


/// problèmes avec les vérifications (comprend pas pk yen a une qui merde alors qu'elle marche toute indépendemment)
///problèmes connexion bdd 


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form class="formulaire" method="POST" action="#">
<p> Votre Nom:</p>
<input type="text" name="family">
<p> Votre Prénom:</p>
<input type="text" name="surname">
<p> Votre Pseudo:</p>
<input type="text" name="pseudo">
<p> Votre Age:</p>
<input type="number" name="age" min=10 max=119>
<p> Votre email:</p>
<input type="text"name="email">
<p> Votre password:</p>
<input type="password" name="password">
<p> Confirmation password:</p>
<input type="password" name="repeatpassword"><br/><br/>
<input type="submit" value="Connexion" name="submit">
<a href='login.php'> Déja membre ? </a>

</form>
</body>
</html>
