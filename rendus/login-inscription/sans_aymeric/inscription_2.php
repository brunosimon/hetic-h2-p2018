<?php



session_start();

require 'inc/config.php';
require_once 'inc/testing.php';



// require_once 'inc/captcha.php'; -> !! problem with header



/* ----- else ----- */

ob_start();



// Post not empty
if (!empty($_POST)) 
{
	 	// echo '<pre>';
	 	// print_r($_POST);
	 	// echo '</pre>';
		ob_end_clean();

	 	$requete = $pdo->prepare('SELECT * FROM users WHERE mail = :mail');
	 	$requete->bindValue(':mail',$_POST['mail']);
	 	$requete->execute();
	 	
	 	// Checking mail in DB
	 	$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');

	 	$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();
	 	$user = $prepare->fetch();

	 	if($user) {
	 		echo "You already have an account";
	 	}


/* ----- Path ----- */

	if ( check_Mail($requete, $_POST['mail']) AND check_Password($_POST['password'], $_POST['mail'], 8) AND check_password_2($_POST['password'], $_POST['password_2']) ) {
			
		// if(isset($_POST["captcha"]) && $_POST["captcha"]!= "" && $_SESSION["code"] == $_POST["captcha"]) {
			
	//Do you stuff


			// ---- Encrypt the password
			 				$prepare = $pdo->prepare('INSERT INTO users (mail,password) VALUES (:mail,:password)');
			 				$prepare->bindValue(':mail',$_POST['mail']);
			 				$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));

			// ---- Send to database
			 				$prepare->execute();
			 				

			// ---- Send Mail
			 				$to      = $_POST['mail'];
							$subject = 'Welcome';
							$message = 'Hello, your confirmation is : ';
							$headers = 'MIME-Version:1.0'."\r\n".
							           'From:server@domain.com'."\r\n";

							mail($to,$subject,$message,$headers);

							// Set cookie
							// $cookie_name 		= "user";
							// $cookie_value 		= $_POST['mail'];
							// $cookie_password 	= $_POST['password'];

							/* ----- Cookie for Rember me -----  */
							if(isset($_POST['remember_me']) == 'cookie') {
								ob_start();
								// echo "You put a cookie";
								setcookie('user',$_POST['mail']);
								// cookie function
								// set_Cookie($_POST['mail'], $_POST['password']);
								ob_end_flush();
							}

							
							

							$_SESSION['user'] = $_POST['mail'];
							// Clear all echo & printr
							if (ob_get_length()) ob_end_clean();

							// set session to acces home page
							// session_set_cookie_params(0);
							
							redirect_hp();

			// }				
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,800italic,300,400,700,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div class="container">
	<h1>Inscription</h1>
	<form action="#" method="POST" class="user_info">
			
			<span class="error">
					<?php if (!empty($_POST)) { if ($user) echo "You already have an account"; } ?>
					<?php if (!empty($_POST)) {if(check_Mail($requete, $_POST['mail']) == false) echo "You must use @"; } ?>	
			</span>
			<input type="text" name="mail" placeholder="email@domain.com" class="user_info">
			<br>
			
			
			<div class="right">
				<label class="button">Remember Me</label><input class="checkbox" type="checkbox" name="remember_me" value="cookie" onclick="cBox();">
				<br>
				
			</div>
			

			<span class="error">
				<?php if (!empty($_POST)) { if (check_Password($_POST['password'], $_POST['mail'], 8) == false) echo "Your password must contain at least 8 charaters & one number"; } ?>
			</span>
			<input type="password" name="password" placeholder="Password" class="user_info">
			<br>
		    
			<span class="error">
				<?php if (!empty($_POST)) { if (check_password_2($_POST['password'], $_POST['password_2']) == false) echo "Your 2 passwords don't match"; } ?>
			</span>
			<input type="password" name="password_2" placeholder="Repeat Password" class="user_info">
			<br>
			<!-- <input class="input_captcha" name="captcha" type="text" placeholder="Captcha">
			<img  class="captcha" src="inc/captcha.php" /><br>
					 -->
		
			<input type="submit" action="">
		
		
	</form>
</div>	
	
	<script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
			

			function cBox () {
				if ($('.checkbox').is(':checked')) {
				console.log('Works');
				$('.button').css("color", "#49708A");
				}
				else {
					console.log("Does not work");
					$('.button').css("color", "#000");
				}
			};


	</script>
</body>
</html>