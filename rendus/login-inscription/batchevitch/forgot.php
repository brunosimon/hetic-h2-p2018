<?php
require 'inc/config.php';
$errorMsg = "";
$sent = false;

if(!empty($_POST['email'])){

	if(empty($_POST['email'])){
		$errorMsg = "Please enter an email.";
		$errors = true;
	}

	// Check if format is aaa111 @ aaa111 . aaa
	else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errorMsg = "Invalid email format.";
		$errors = true; 
	}
	else {
		$email = $_POST['email'];

		$prepare = $pdo->prepare("SELECT * FROM users WHERE email ='".$email."' LIMIT 1");
		$prepare->execute();
		$user = $prepare->fetch();

		if ($user) {

		//Let's create special hash for email
			$hash = "";

		//Let's create a random hash
			for ($i = 0; $i < 45; $i++) {
				$hash .= chr(rand(0,250));
			}
			$hash = hash('md5', $hash);

			$prepare = $pdo->prepare('UPDATE users SET forgotpasshash=:hash WHERE email="'.$email.'"');
			$prepare->bindValue('hash',$hash);
			$prepare->execute();

		//Send Mail with PHPMAILER
			date_default_timezone_set('Etc/UTC');
			require 'PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "email.bidon.inutil@gmail.com";
			$mail->Password = "password.bidon.nul";
			$mail->setFrom('MyLittleForm@website.com', 'MyLittleForm in PHP');
			$mail->addAddress($email, 'MyLittleForm User');
			$mail->Subject = 'MyLittleForm - Change Password';

			$mail->MsgHTML('

				Hello, a request has been made to change your password. <br>
				If you haven\'t made this request then ignore this email. <br>

				Please click the following link to change your password: <br>

				<p style="color: red;"> !!! PAR CONTRE FAUT MODIFIER LE LIEN A VOTRE URL WAMP !!! <br>
					Soit: votre_url/changepass.php?email='.$email.'&mailHash='.$hash.'</p> <br>

					<a href="http://localhost/hetic/MyLittleForm/PHP%20-%20Template/changepass.php?email='.$email.'&mailHash='.$hash.'"> 
						http://localhost/hetic/MyLittleForm/PHP%20-%20Template/changepass.php?email='.$email.'&mailHash='.$hash);

			$mail->send();
			$sent = true;

			header("Refresh: 10; url=index.html");
		}
	}
		//I shouldn't say this IRL but just so you know
	// $errorMsg = "This email doesn't exist.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyLittleForm - Forgot Passord</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="back">
		<a href="login.php">Back</a>
	</div>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<fieldset>

			<legend>
				Forgot Password
			</legend>
			<?PHP
			if($errorMsg != "") {
				echo "<p style=\"color: red;\">",htmlspecialchars($errorMsg),"</p><br>\n\n";
			}
			if($sent) {
				echo "<p style=\"color: green;\">","Mail has been sent.","</p><br>\n\n";
			}
			?>
			<input type="text" name="email" placeholder="EMail">
			<br>
			<input type="submit" value="Send">
		</fieldset>
	</form>
	
</body>
</html>