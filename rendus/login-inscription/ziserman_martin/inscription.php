<?php
	/*
		TODO : 
		[√]Créer html form
		[√]Gestion des erreurs du formulaire
		[√]set data back if errors occured
		[ ]Tester la complexité du mot de passe
		[√]Tester si le mail n'a pas déjà été enregistré dans la BDD
		[√]Tester si le nom n'a pas déjà été enregistré dans la BDD
		[√]Bouton de déconnexion sur la page privée
		[ ]Limiter le nombre de tentatives
		[√]Mots de passe sécurisés (hash et salt minimum) 
	*/
	require 'inc/config.php';
	/* Je n'ai pas réussi à refaire la gestion d'erreur par tableau que nous avions fait en cours à cause de plusieurs bugs :
		- $pdo est considéré comme null dans la fonction get_errors
		- J'ai des notice Undefined variable lorsque j'essaie de définir les variables $name, $pass...
		- Pour régler le bug précédant, j'ai essayé :
			if empty($_POST['name'])
	 			$_POST['name']   = '';
		qui résulte en une page blanche
	*/
	// echo gettype ($pdo);
	// function get_errors($data){
	// 	if empty($_POST['name'])
	// 		$_POST['name']   = '';
	// 	if empty($_POST['mail'])
	// 		$_POST['mail']   = '';
	// 	if empty($_POST['pass'])
	// 		$_POST['pass']   = '';
	// 	if empty($_POST['pass2'])
	// 		$_POST['pass2']  = '';
	// 	$result = array();
	//	$name   = trim($data['name']);
	// 	$pass   = $data['pass'];
	// 	$pass2  = $data['pass2'];
	// 	$birth  = $data['birth'];
	// 	$mail   = trim($data['mail']);

	// 	if(!empty($_POST)){
	// 		$prepare = $pdo->prepare('SELECT * FROM user WHERE name = :name LIMIT 1');
	// 		$prepare->bindValue(':name',$_POST['name']);
	// 		$prepare->execute();
	// 		$user = $prepare->fetch();
	// 		if (isset($user->name)){
	// 			$result['name'] = 'Nom déjà utilisé';
	// 		}
	// 		$prepare = $pdo->prepare('SELECT * FROM user WHERE mail = :mail LIMIT 1');
	// 		$prepare->bindValue(':mail',$_POST['mail']);
	// 		$prepare->execute();
	// 		$user = $prepare->fetch();
	// 		if(isset($user->mail)){
	// 			$result['mail'] = 'Mail déjà utilisé';
	// 		}
	// 	} 
	// 	if(empty($name))
	// 		$result['name'] = 'Nom manquant';
	// 	else if(strlen($name)<2)
	// 		$result['name']='Nom trop court';
	// 	if(empty($age))
	// 		$result['age'] = 'Age manquant';
	// 	else if($age<1 || $age>125)
	// 		$result['age'] = 'Age invalide';
	// 	if(empty($mail))
	// 		$result['mail'] = 'Mail manquant';
		
	// 	return $result;
	// }
	// $errors = array();
	// $errors = get_errors($_POST);
	// if(empty($errors)){
	// 	$succes[]='1';
	// }
	if(!empty($_POST)){
		$prepare = $pdo->prepare('SELECT * FROM user WHERE name = :name LIMIT 1');
		$prepare->bindValue(':name',$_POST['name']);
		$prepare->execute();
		$user = $prepare->fetch();
		if (!isset($user->name)){
			$prepare = $pdo->prepare('SELECT * FROM user WHERE mail = :mail LIMIT 1');
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->execute();
			$user = $prepare->fetch();
			if(!isset($user->mail)){
				if (isset($_POST['pass']) && !empty($_POST['pass'])){
					if ($_POST['pass']==$_POST['pass2']){
						if (isset($_POST['mail']) && !empty($_POST['mail'])){
							if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
								$prepare = $pdo->prepare('INSERT INTO user (name,password,mail) VALUES (:name,:pass,:mail)');
								$prepare->bindValue(':name',$_POST['name']);
								$prepare->bindValue(':mail',$_POST['mail']);
								$prepare->bindValue(':pass',hash('sha256',SALT.$_POST['pass']));
								$prepare->execute();
								header("location:connection.php");
							} else {
								echo "Votre email est invalide";
							}
						}
					} else {
						echo "Les deux mots de passe ne correspondent pas.";
					}	
				} 
			} else {
				echo "Votre mail est déjà utilisé";
			}
		} else {
			echo "Votre nom est déjà utilisé";
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
	<form action="#" method="POST">
		<div class="name">
			<label for="name">Nom</label>
			<input type="text" id="name" name="name" placeholder="Entrez votre nom" value="<?= !empty($_POST['name'])? $_POST['name'] : '' ?>">
		</div>
		<div class="mail">
			<label for="mail">Mail</label>
			<input type="text" id="mail" name="mail" placeholder="Entrez votre mail" value="<?= !empty($_POST['mail'])? $_POST['mail'] : '' ?>">
		</div>
		<div class="pass">
			<label for="pass">Mot de Passe</label>
			<input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe">
		</div>
		<div class="pass2">
			<label for="pass2">Vérifiez votre mot de Passe</label>
			<input type="password" id="pass2" name="pass2" placeholder="Vérifiez mot de passe">
		</div>
		<div class="birth">
			<label for="birth">Date de Naissance</label>
			<input type="date" id="birth" name="birth" value="<?= !empty($_POST['birth'])? $_POST['birth'] : '' ?>">
		</div>
		<div>
			<input type="submit" value="inscription">
		</div>
	</form>
</body>
</html>