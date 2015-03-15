<?php
require 'inc/config.php';

$errorM = "";
$success = "";

// If we found email and hash in the url...
if(!empty($_GET['email']) && !empty($_GET['mailHash'])){
    // Get data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['mailHash']; // Set hash variable

    // if user found in DB
    $prepare = $pdo->prepare("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
    $prepare->execute();
    $mail = $prepare->fetch();

    if($mail){
    	// set user as active so he can login in
    	$prepare = $pdo->prepare("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
    	$prepare->execute();
    	$success = 'Congratulation! Your Pony account has been activated, you now can login.';
    }else{
        // No match -> invalid url or account has already been activated.
    	$errorM = 'Oops! The URL is either invalid or you already have activated your account.';
    }

} else{
    // Invalid approach
	$errorM = 'Invalid URL. Please retry later or check your URL again.';
}

header("Refresh: 5; url= index.html");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyLittleForm - Verification validation</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="message">

		<?PHP
		if($errorM != "") {
			echo "<p style=\"color: red;\">*",htmlspecialchars($errorM),"</p><br>\n\n";
		}
		?>

		<?PHP
		if($success != "") {
			echo "<p style=\"color: green;\">",htmlspecialchars($success),"</p><br>\n\n";
		}
		?>

		<p>This page will redirect you to the index in about 5 seconds.</p>

	</div>

</body>
</html>