<?php
require 'inc/config.php';

$errorMsg = array();
$success = "";

if(empty($_POST['password'])){

// If we found email and hash in the url...
	if(!empty($_GET['email']) && !empty($_GET['mailHash'])){
    // Get data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['mailHash']; // Set hash variable

    // if user found in DB
    $prepare = $pdo->prepare("SELECT email, forgotpasshash FROM users WHERE email= :email AND forgotpasshash= :forgotpasshash");
    $prepare->bindValue('forgotpasshash',$hash);
    $prepare->bindValue('email',$email);
    $prepare->execute();
    $mail = $prepare->fetch();

    if($mail){


    }else{
        // No match -> invalid url or account has already been activated.
    	array_push($errorMsg, "Oops! The URL is either invalid or you already used this URL.");
    	header("Refresh: 5; url= index.html");
    }

}else{
    // Invalid approach
	array_push($errorMsg,'Invalid URL. Please retry later or check your URL again.');
	// header("Refresh: 5; url= index.html");
}
}

else if(!empty($_POST['password'])){
	$password = $_POST['password'];
	$email = "";
	if (!empty($_GET['email'])) {
		$email = $_GET['email'];
	}
	else {
		array_push($errorMsg,"Failed to change password. Re-enter the correct URL.");
	}

	// Password checks
	if (strlen($password) < 8) {
		array_push($errorMsg, "Password too short! Need At least 7 characters.");
	}
	if (!preg_match("#[0-9]+#", $password)) {
		array_push($errorMsg, "Password must include at least one number.");
	}
	if (!preg_match("#[a-z]+#", $password)) {
		array_push($errorMsg, "Password must include at least one uncapitalized (a-z) letter.");
	}
	if (!preg_match("#[A-Z]+#", $password)) {
		array_push($errorMsg, "Password must include at least one capital letter.");
	}

	if($errorMsg == array()){
		//This is will be the new hash for the forgotpass just so that the user cant reuse the link provided in email.
		$reset = rand(54,8645418);
	//change pass and reset passwordhash link
		$prepare = $pdo->prepare('UPDATE users SET password= :password , forgotpasshash= :reset , hashsalt= :hashsalt WHERE email= :email');
		$prepare->bindValue('password',hash('sha256',SALT.$password));
		$prepare->bindValue('reset',$reset);
		$prepare->bindValue('hashsalt',SALT);
		$prepare->bindValue('email', $email);
		$prepare->execute();
		$success = "Password successfully changed!";
	}

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


	<form action="" method="POST">
		<fieldset>
			<legend>
				Change Password
			</legend>
			<?PHP
			if($errorMsg != array()) {
				$str = array_pop($errorMsg);
				while ($str != null) {
					echo "<p style=\"color: red;\">*",htmlspecialchars($str),"</p><br>\n\n";
					$str = array_pop($errorMsg);
				}
			}

			if($success != ""){
				echo "<p style=\"color: green;\">",htmlspecialchars($success),"</p><br>\n\n";
			}
			?>
			<p>Choose a new password:</p>
			<input type="password" name="password" placeholder="Password">
			<br>
			<input type="submit" value="Confirm">
		</fieldset>
	</form>

</body>
</html>