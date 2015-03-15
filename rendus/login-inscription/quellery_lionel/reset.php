<?php
include ("script/connect.php");
$email = $_POST['email'];
$query = $conn->query("SELECT * FROM users WHERE email='$email'");
$count = $query->rowCount();

if ($count == 1) {

	function ramdomlionel($length) {
		$lenghtCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
		$lengtNumberMatch = strlen($lenghtCharacters);
		$resultat         = "";

		for ($i = 0; $i < $length; $i++) {
			$index = mt_rand(0, $lengtNumberMatch-1);
			$resultat .= $lenghtCharacters[$index];
		}
		return $resultat;
	}

	$token = ramdomlionel(10);
	$q     = $conn->prepare("UPDATE users SET token=:token WHERE email = :email");

	$q->execute(array(
			':email' => $email,
			':token' => $token,

		));

	function mailresetlionellink($to, $token) {
		$subject    = "Mot de Passe du site Lionel Quellery";
		$linklionel = 'http://'.$_SERVER['HTTP_HOST'];
		$message    = '
<html>
<head>
<title>lionel.com</title>
</head>
<body>
<p>clik Your reset password link <a href="'.$linklionel.'/labs/login/forgot.php?token='.$token.'">renitialiser votre de passe</a></p>



</body>
</html>
';
		$headers = "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1"."\r\n";
		$headers .= 'From: <lionel.quellery@gmail.com>'."\r\n";
		$headers .= 'Cc: lionel.quellery@gmail.com'."\r\n";

		if (mail($to, $subject, $message, $headers)) {
			echo "<h1 color='red'>Your reset Link password Send to : <b>".$to."</b></h1>";
		}

	}
	if (isset($_POST['email'])) {
		mailresetlionellink($email, $token);

	}
} else {
	echo "users not exit  .";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simon Backend</title>
	<link rel="stylesheet" type="text/css" href="script/styles.css">
</head>
<body>


<section class="section-login">
  <div class="section-center">
    <h2>Welcome,<span class="username">to Hetic Search Engine Version Beta</span></h2>


  <form action="reset.php" method="post">
  <h2>Reset your password Enter your Email</h2>
<input type="text" name="email" placeholder="email">
<input type="submit" name="submit" value="new password" >
</form>

  </div>
  <footer class="section-footer">
    <a href="http://lionelquellery.com/labs/login/index.php" class="link-lostpass">Login</a>


  </footer>
</section>
</body>
</html>

