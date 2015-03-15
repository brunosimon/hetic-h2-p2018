<?php
require 'inc/config.php';

// Initialize variables to null.
$fnameError ="";
$lnameError ="";
$genderError ="";
$pnameError ="";
$emailError ="";
$passwordError = array();
$password2Error ="";
$captchaError ="";

// If errors than do not send to DB
$errors = false;

//Variable to keep values
$fname="";
$lname="";
$pname="";
$email="";

// Variable pour email de confirmation
$send = false;
$emailMsg = "Thanks for registering, we've sent you an email to confirm your registration. Go check it out! :)";

// Let's start a session to place the result of Captcha in it, we will configure captcha further in captcha.php
session_start();

// if($_POST['reload'] and $_SERVER['REQUEST_METHOD'] == "POST"){
// 	echo 'hi';
// }

if(!empty($_POST)){ // is Form empty?

	// Verifications:

	// ------------------------- First Name -----------------------
	//First Name Empty test then number test: (Contains numbers? WHY? ARE YOU R2D2? NO? THEN STAHP TROLLING MY LITTLE FORM!)

	if(empty($_POST['fname'])){
		$fnameError = "Please enter your First Name.";
		$errors = true;
	}

	else if (!preg_match("/^[a-zA-Z ]*$/",$_POST['fname'])) {
		$fnameError = "Please only enter letters and white-spaces.";
		$errors = true;
	} 

	//Save value incase form is invalid so that user doesnt need to retype.
	else {
		$fname = $_POST['fname'];
	}

	// ------------------------- Last Name-----------------------
	//Last Name sams tests:
	if(empty($_POST['lname'])){
		$lnameError = "Please enter your Last Name.";
		$errors = true;
	}

	else if (!preg_match("/^[a-zA-Z ]*$/",$_POST['lname'])) {
		$lnameError = "Please only enter letters and white-spaces.";
		$errors = true;
	} 

	//Save value incase form is invalid so that user doesnt need to retype.	
	else {
		$lname = $_POST['lname'];
	}


	// ------------------------- Pony Name-----------------------
	//Sams tests:
	if(empty($_POST['pname'])){
		$pnameError = "Please choose a Pony Name.";
		$errors = true;
	}

	// Checking in DB if PonyName already exists
	$prepare = $pdo->prepare('SELECT * FROM users WHERE pname = :pname LIMIT 1');

	$prepare->bindValue('pname',$_POST['pname']);
	$prepare->execute();
	$user = $prepare->fetch();

	if($user){
		$pnameError = "Pony Name already taken.";
		$errors = true;
	}
	else {
		$pname = $_POST['pname'];
	}

	// ------------------------- Email-----------------------
	if(empty($_POST['email'])){
		$emailError = "Please enter an email.";
		$errors = true;
	}

	// Check if format is aaa111 @ aaa111 . aaa
	else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$emailError = "Invalid email format.";
		$errors = true; 
	}

	// Checking if email is already in database
	$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');

	$prepare->bindValue('email',$_POST['email']);
	$prepare->execute();
	$userEmail = $prepare->fetch();

	if($userEmail){
		$emailError = "Email is already registered.";
		$errors = true;
	}
	else {
		$email = $_POST['email'];
	}

	// ------------------------- Passwords-----------------------

	//Same Password?
	$p1 = $_POST['password'];
	$p2 = $_POST['password2'];
	if($p1 != $p2){
		array_push($passwordError, "Passwords not matching.");
		$password2Error = "Passwords not matching.";
		$errors = true;
	}

	// Check password length, must be over 7.
	if (strlen($p1) < 8) {
		array_push($passwordError, "Password too short! Need At least 7 characters.");
		$errors = true;
	}

	// Must contain numbers
	if (!preg_match("#[0-9]+#", $p1)) {
		array_push($passwordError, "Password must include at least one number.");
		$errors = true;
	}

	// Must contain 1 uncapitalized letter
	if (!preg_match("#[a-z]+#", $p1)) {
		array_push($passwordError, "Password must include at least one uncapitalized (a-z) letter.");
		$errors = true;

	}

	// Must contain 1 capitalized letter
	if (!preg_match("#[A-Z]+#", $p1)) {
		array_push($passwordError, "Password must include at least one capital letter.");
		$errors = true;

	}

	// Let's not force our users to put special symbols even if we could with regex '#\W+#' ...

	// Is passsword = first name?
	if($_POST['fname'] != ""){
		if ($_POST['fname'] == $p1) {
			$passwordError = "Password cannot be your First Name!";
			echo $passwordError;
			$errors = true;

		}   
	}

	//Captcha

	//Since font is hard to read (upper or lower?) I change all letters to UPPER.
	$captcha = strtoupper($_POST['captcha']);

	// If user disabled cookies (since I'm too lazy to add captcha to DB we'll ask user to enable cookies)
	if(empty($_SESSION['captcha'])){
		$captchaError = "Please enable cookies.";
		$errors = true;
	}
	else if($captcha != $_SESSION['captcha']) {
		$captchaError = "Incorrect CAPTCHA. Please try again.";
		$errors = true;
	} 

	if(!$errors){

		$prepare = $pdo->prepare('INSERT INTO users(fname,lname,gender,pname,email,password,hash, hashsalt) VALUES (:fname,:lname,:gender,:pname,:email,:password,:ehash,:hashsalt)');

		$prepare->bindValue('fname',$_POST['fname']);
		$prepare->bindValue('lname',$_POST['lname']);
		$prepare->bindValue('gender',$_POST['gender']);
		$prepare->bindValue('pname',$_POST['pname']);
		$prepare->bindValue('email',$_POST['email']);
		$prepare->bindValue('password',hash('sha256',SALT.$_POST['password']));

		$mailHash = md5(rand(5,9854).$fname.Date('MYDd').rand(5,9854));
		$prepare->bindValue('ehash', $mailHash);

		$prepare->bindValue('hashsalt', SALT);
		//$prepare->bindValue('password',$_POST['password']);



		$exec = $prepare->execute();

	//Send email
		$send = true;

		// So I'm using PHPMAILER as you suggested :)

		date_default_timezone_set('Etc/UTC');

		require 'PHPMailer/PHPMailerAutoload.php';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "email.bidon.inutil@gmail.com";

		//Password to use for SMTP authentication
		$mail->Password = "password.bidon.nul";

		//Set who the message is to be sent from
		$mail->setFrom('MyLittleForm@website.com', 'MyLittleForm in PHP');

		//Set who the message is to be sent to
		$mail->addAddress($email, $pname);

		//Set the subject line
		$mail->Subject = 'MyLittleForm - Registration Verification Mail';

		$url = "";
		$url = "http://localhost/hetic/MyLittleForm/PHP%20-%20Template/verify.php?email=".$email."&mailHash=".$mailHash;

		$mail->MsgHTML('

			Thanks <b>'.$pname.'</b> for registering! <br>

			Please click the following link to activate your account: <br>

			<p style="color: red;"> !!! PAR CONTRE FAUT MODIFIER LE LIEN A VOTRE URL WAMP au fichier verify.php !!! <br>
				Soit: votre_url/verify.php?email='.$email.'&mailHash='.$mailHash.'</p> <br>

				<a href="http://localhost/hetic/MyLittleForm/PHP%20-%20Template/verify.php?email='.$email.'&mailHash='.$mailHash.'"> 
					http://localhost/hetic/MyLittleForm/PHP%20-%20Template/verify.php?email='.$email.'&mailHash='.$mailHash);

		$mail->send();

		header("Refresh: 10; url=index.html");

	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyLittleForm - Register</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="back">
		<a href="index.html">Back</a>
	</div>

	<!-- Action to php file so url doesn't change if not valid -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<fieldset>

			<legend>
				Register
			</legend>

			<?PHP
			if($errors && $fnameError != "") {
				echo "<p style=\"color: red;\">*",htmlspecialchars($fnameError),"</p><br>\n\n";
			}
			?>
			<input type="text" name="fname" id="fname" maxlength="30" placeholder="First Name" value="<?= $fname; ?>" >
			<br>
			<?PHP
			if($errors && $lnameError != "") {
				echo "<p style=\"color: red;\">*",htmlspecialchars($lnameError),"</p><br>\n\n";
			}
			?>
			<input type="text" name="lname" id="lname" maxlength="30" placeholder="Last Name" value="<?= $lname; ?>">
			<br>
			<label>
				Male<input type="radio" name="gender" value="m" checked="true">
			</label>
			<label>
				Female<input type="radio" name="gender" value="f">
			</label>
			<br>
			<?PHP
			if($errors && $pnameError != "") {
				echo "<p style=\"color: red;\">*",htmlspecialchars($pnameError),"</p><br>\n\n";
			}
			?>
			<input type="text" name="pname" placeholder="Pony Name (UserName)" value="<?= $pname; ?>">
			<br>
			<?PHP
			if($errors && $emailError != "") {
				echo "<p style=\"color: red;\">*",htmlspecialchars($emailError),"</p><br>\n\n";
			}
			?>
			<input type="text" name="email" placeholder="EMail" value="<?= $email; ?>">
			<br>
			<div class="errorMsg">
				<?PHP
				if($errors) {
					$str = array_pop($passwordError);
					while ($str != null) {
						echo "<p style=\"color: red;\">*",htmlspecialchars($str),"</p><br>\n\n";
						$str = array_pop($passwordError);
					}
				}
				?></div>
				<input type="password" name="password" placeholder="Password">
				<br>
				<?PHP
				if($errors && $password2Error != "") {
					echo "<p style=\"color: red;\">*",htmlspecialchars($password2Error),"</p><br>";
				}
				?>
				<input type="password" name="password2" placeholder="Re-type Password">
				<br>

				<!-- The Captcha image with refresh option in JS -->
				<p><img id="captcha" src="captcha.php" border="1" alt="CAPTCHA">
					<br><a href="#" onclick="
					document.getElementById('captcha').src = 'captcha.php?' + Math.random();
					document.getElementById('captcha_code').value = '';	
					return false;
					">Refresh Captcha</a>
				</p>
				<br>

				<?PHP
				if($errors && $captchaError != "") {
					echo "<p style=\"color: red;\">*",htmlspecialchars($captchaError),"</p>";
				}
				?>
				<p><input type="text" name="captcha" id="captcha_code" /></p>

				<input type="submit" value="Register!">


				<?PHP
				if($send) {
					echo "<p style=\"color: green;\"> SUCCESS! ",htmlspecialchars($emailMsg),"</p>";
					echo "<p>Rediction in 10 seconds.</p>";
					echo "<p>In case you're too lazy to check the url in your email... </p>
					<p style=\"color: orange;\"> <a href=\"http://localhost/hetic/MyLittleForm/PHP%20-%20Template/verify.php?email=$email&mailHash=$mailHash\"> http://localhost/hetic/MyLittleForm/PHP%20-%20Template/verify.php?email=$email&mailHash=$mailHash
					</a> </p>";
				}
				?>
			</fieldset>
		</form>
	</body>
	</html>