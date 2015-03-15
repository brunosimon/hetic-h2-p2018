<?php

	require 'inc/config.php';



	if(!empty($_POST))
	{	
		if(!empty($_POST['mail'])) 
		{
			// Vérifie si la chaine ressemble à un email
			if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) 
			{	
				//Vérifie si le mail existe déjà
				$req = $pdo->prepare('SELECT COUNT(*) AS a FROM users WHERE mail = :mail');
				$req->execute(array('mail' => $_POST['mail']));
				$data = $req->fetch();
				if($data->a == 0)
				{	
					if(!empty($_POST['password'])) //Vérifie si le champ pass est vide
					{
						if(strlen($_POST['password'])>6) // Vérifie si le champ pass contient 6 caractères minimums
						{
							if(!ctype_alpha($_POST['password']) && !ctype_digit($_POST['password']) && !ctype_punct($_POST['password'])) // Vérifie que le pass contient chiffres, lettres, ponctuations
							{
								if($_POST['password'] == $_POST['passwordbis']) // Vérifie que les deux pass sont identiques
								{
								
								echo "<div id='sucess'><h3>Inscription réussie ! Vous allez être redirigé</h3></div>"; 
								echo "<meta http-equiv='refresh' content='3;URL=http://localhost:8888/passwords/login.php'>"; // Redirection
								$prepare = $pdo->prepare('INSERT INTO users (mail,password,salt) VALUES (:mail,:password,:salt)'); 
											
								$salt = substr(base64_encode(md5(microtime())), 0, 12); // Salt unique : micro time + hash via md5, base 64 pour récupérer en hexa , et substr pour obtenir 12 caractères uniquement

								$prepare->bindValue(':mail',$_POST['mail']);
								$prepare->bindValue(':password',hash('sha256',$salt.$_POST['password']));
								$prepare->bindValue(':salt',$salt);
								$prepare->execute();
								
								
							} else {
								echo "<div id='formwrong'><h3> - Les deux passwords ne sont pas identiques .</h3></div>";
							}
						}else {
							echo "<div id='formwrong'><h3> - Le password n'est pas assez long, 6 caractères minimum .</h3></div>";					
						}
					} else{
						echo "<div id='formwrong'><h3> - Veuillez renseignez des chiffres et ponctuations .</h3></div>";
					}
				} else{
					echo "<div id='formwrong'><h3> - Champ password vide .</h3></div>";
				}
			} else {
				echo "<div id='formwrong'><h3> - Mail déjà existant .</h3></div>";
			}
		} else{
			echo "<div id='formwrong'><h3> - Email non valide .</h3></div>";
		}
	} else {
		echo "<div id='formwrong'><h3> - Champ mail vide .</h3></div>";
	}
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template PHP - 1</title>
	<link rel="stylesheet" href="style.css">
</head>
		<body>
		<div class="container">
			<section class="content">
				<h2>Inscription</h2>
				<form action="#" method="POST">
				<span class="input input--minoru">
					<input class="input__field input__field--minoru" type="text" id="input-13" name="mail"/>
					<label class="input__label input__label--minoru" for="input-13">
						<span class="input__label-content input__label-content--minoru">Email</span>
					</label>
				</span>
				<span class="input input--minoru">
					<input class="input__field input__field--minoru" type="text" id="input-14" name="password" placeholder="6 caractères minimum"/>
					<label class="input__label input__label--minoru" for="input-14">
						<span class="input__label-content input__label-content--minoru">Password</span>
					</label>
				</span>
				<span class="input input--minoru">
					<input class="input__field input__field--minoru" type="text" id="input-15" name="passwordbis"/>
					<label class="input__label input__label--minoru" for="input-15">
						<span class="input__label-content input__label-content--minoru">Confirmation Password</span>
					</label>
				</span>
				<span class="input input--minoru">
					<input class="input__field input__field--minoru" type="submit" id="input-16" name="submit"/>
					<label class="input__label input__label--minoru" for="input-16">
					</label>
				</span>
				</form>
			</section>
		</div>
		<!-- /container -->
		<script src="js/classie.js"></script>
	</body>
</html>
	</form>	
</body>
</html>