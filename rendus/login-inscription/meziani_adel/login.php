<?php

	require 'inc/config.php';

	if(!empty($_POST))
	{	

		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();

		$user = $prepare->fetch();

		if(!$user) // Vérifie si l'utiliseateur est déjà inscrit
		{
			echo "<div id='formwrong'><h3> - Vous devez vous inscrire .</h3></div>";
		}
		else
		{
			if($user->password == hash('sha256',$user->salt.$_POST['password'])) // Vérifie si le password correspond à celui lors de l'inscription
			{
				echo 'Bonjour ' . htmlspecialchars($_POST["mail"]) . '!';
				exit;
			}
			else
			{
				echo "<div id='formwrong'><h3> - Mail ou password invalide .</h3></div>";
			}
		
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
				<h2>Connexion</h2>
				<form action="#" method="POST">
				<span class="input input--minoru">
					<input class="input__field input__field--minoru" type="text" id="input-13" name="mail"/>
					<label class="input__label input__label--minoru" for="input-13">
						<span class="input__label-content input__label-content--minoru">Email</span>
					</label>
				</span>
				<span class="input input--minoru">
					<input class="input__field input__field--minoru" type="text" id="input-14" name="password"/>
					<label class="input__label input__label--minoru" for="input-14">
						<span class="input__label-content input__label-content--minoru">Password</span>
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