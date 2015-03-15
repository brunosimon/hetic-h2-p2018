<?php 

require 'inc/config.php';

if(!empty($_POST))
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// Variable pour afficher les erreurs + Variable de validation du formulaire
		$errors = array();
		$valid = true;

		// Variables vérifiant qu'on ne puisse pas mettre de chiffre pour firstname et lastname
		$firstnameNumber = strcspn($_POST['firstname'], '0123456789\"\?*:/@|<>()');
		$lastnameNumber = strcspn($_POST['lastname'], '0123456789\"\?*:/@|<>()');

		// Test de firstname
		if(empty($_POST['firstname']))
		{
			$valid = false;
			array_push($errors,'First name is missing');
		}
		else if ((strlen($_POST['firstname']) < 2) || ($firstnameNumber != strlen($_POST['firstname'])))
			array_push($errors,'First name is wrong');

		// Test de lastname
		if(empty($_POST['lastname']))
		{
			$valid = false;
			array_push($errors,'Last name is missing');
		}
		else if (strlen($_POST['lastname']) < 2 || ($lastnameNumber != strlen($_POST['lastname'])))
			array_push($errors,'Last name is wrong');

		// Test de username
		if(empty($_POST['username']))
		{
			$valid = false;
			array_push($errors,'Username is missing');
		}
		else if (strlen($_POST['username']) < 2)
			array_push($errors,'Username is wrong');

		// Test de age
		if(empty($_POST['age']))
		{
			$valid = false;
			array_push($errors,'Age is missing');
		}
		else if ($_POST['age'] < 1 || $_POST['age'] > 100)
			array_push($errors,'Age is wrong');

		// Test de mail
		if(empty($_POST['mail']))
		{
			$valid = false;
			array_push($errors,'Mail is missing');
		}
		else if (!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL))
			array_push($errors,'Mail is wrong');

			// Vérifie si mail déjà dans BDD
			$prepare = $pdo->prepare('SELECT mail FROM users WHERE mail = :mail');
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->execute();
			$mail = $prepare->fetch();
			
				if ($mail) 
				{
					$valid = false;
					array_push($errors,'Mail already exists');
				}

		// Test de password
		if(empty($_POST['password']))
		{
			$valid = false;
			array_push($errors,'Password is missing');
		}
		else if ($_POST['password'] < 6)
			array_push($errors,'Password is too short');
		
		if($_POST['password'] != $_POST['confirmpassword'])
		{
			$valid = false;
			array_push($errors,'Your passwords do not match');
		}
	
	  /*// Test que password ne contient pas que des lettres ou que des chiffres
		// Variable pour complexifier le password
		 $password = array($_POST['password'],'[a-z-0-9]');
		 foreach ($password as $testpassword) 
		 {	
         	if (ctype_alnum($testpassword))
           	{
           		$valid = false;
           		array_push($errors,'Your password is not enough complex');
           	} 
		 }*/
		
		// Condition pour enregistrer dans la BDD seulement si tous les champs sont bien remplis
		if ($valid)
		{
			// Enregistrer les donnée dans la BDD
			$prepare = $pdo->prepare('INSERT INTO users (firstname,lastname,username,age,mail,password) VALUES (:firstname,:lastname,:username,:age,:mail,:password)');
			$prepare->bindValue(':firstname',$_POST['firstname']);
			$prepare->bindValue(':lastname',$_POST['lastname']);
			$prepare->bindValue(':username',$_POST['username']);
			$prepare->bindValue(':age',$_POST['age']);
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':password',hash('sha256',md5(PRE_SALT.$_POST['password'].SUF_SALT)));
			$prepare->execute();

			header('Location: login.php');
		}

		// echo '<pre>';
		// print_r($errors);
		// echo '</pre>';

		// Afficher les erreurs si il y en a
		if(!empty($errors)) 
		{ 
			foreach($errors as $error) 
			{
				echo $error.'<br>';
		    }
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Devoir PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<fieldset >
	<legend>Registration</legend>
	<form action="#" method="POST" id="form">
		<?php if (is_array(isset($errors))) { foreach(isset($errors) as $error){ ?>
				<p class="errors">
					<?php echo $error; ?>
				</p>
			<?php } } ?>
		<label>First name</label><input type="text" name="firstname" placeholder="Gary">
		<br>
		<label>Last name</label><input type="text" name="lastname" placeholder="Oldman">
		<br>
		<label>Username</label><input type="text" name="username" placeholder="DeluxePsychopath">
		<br>
		<label>Age</label><input type="number" name="age" placeholder="56">
		<br>
		<label>Mail</label><input type="text" name="mail" placeholder="example@gmail.com">
		<br>
		<label>Password</label><input type="password" name="password" placeholder="*******">
		<br>
		<label>Password (confirm)</label><input type="password" name="confirmpassword" placeholder="*******">
		<br>
		<button type="submit">Send</button>
	</form>
	</fieldset>	
</body>
</html>