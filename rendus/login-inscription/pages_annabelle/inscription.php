<?php

	require 'inc/config.php';


	if(!empty($_POST))
	{
		/*
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		*/

		$prepare = $pdo->prepare('INSERT INTO users (mail,password,birthdate) VALUES (:mail,:password,:birthdate)'); 

		$prepare->bindValue(':mail', $_POST['mail']);
		$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
		$prepare->bindValue(':birthdate', $_POST['birthdate']); 

		$prepare->execute();
	}


?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Inscription Devoir</title>
		<link rel="stylesheet" href="inc/style1.css">
	</head>
	<body>


		<h1>Welcome!</h1>
		<p>To access the site, please register below. <br/>
		Already have an account ? Just <a href="login.php">sign in</a> !</p>

		<h2>Inscription</h2>

		<?php
			error_reporting(E_ALL);
			//Checking fields emptiness  Note : en l'état, l'inscription se valide à partir du moment où la syntaxe d'une adresse mail est valide. 
			if(!empty($_POST)){
				$return=1;
				foreach($_POST as $name=>$data){
					if(empty($data)){
						echo '<div class="error">The ',$name,' is missing<br/></div>';
						$return=0;
					}
				}
				//Checking email address syntax
				if (isset($_POST['mail'])){
					if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
  						echo '<div class="success">This is a valid email address. Perfect ! <a href="login.php">Log in</a> now</div>';
					} 
					else {
  						echo('<div class="error">This is not a valid email address.<br/></div>Please write a proper one.');
					}
				}
			}
		?>


		<!--Form Part-->
		<form action="#" method="POST">
			
			<fieldset>
				<legend>IDs</legend>
				<div>
					<label>What's your mail address ?</label><br/>
					<input type="text" placeholder="Your Mail" id="mail" name="mail">
				</div><br/>
				<div>
					<label>Choose a password</label><br/>
					<input type="password" placeholder="Your Password" id="password" name="password">
				</div> 
			</fieldset><br/><br/>

			<fieldset>
				<legend>Personal Informations (no worry, it'll remain private)</legend>
				<div>
					<label>When is you birthday?</label><br/>
					<input type="date" name="birthdate">
				</div><br/>
			</fieldset><br/>
			
				<!-- Captcha Part. Note : La partie vérification des caractères soumis ne fonctionne pas encore-->

				<?php
   					if (isset($_POST['submitform'])){
      					$secure = isset($_POST['secure']) ? strtolower($_POST['secure']) : '';
      					if (isset($_POST['verif'])){
      						if ($secure == $_SESSION['verif']){
         						echo 'Correct';
         						unset($_SESSION['verif']);
      						}
      					}
      					else{ 
      						echo 'Wrong Captcha';
         				}
    				}
				?></br>
      			
         			Code de sécurité:
              		<input name="captcha" type="text" size="8"/>
              		<img src="inc/verif.php" alt=""/><br/><br/>
              		<input type="submit" name="submitform" value="submit"/> 
      				<br/>

			</body>
	
		</form>
	</body>
</html>

