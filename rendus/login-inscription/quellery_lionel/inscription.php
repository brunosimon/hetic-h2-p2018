<?php
include ("script/connect.php");
$email        = $_POST['email'];
$username     = $_POST['username'];
$password     = sha1($_POST['password']."AZERTY23Y4");
$confpassword = sha1($_POST['confpassword']."AZERTY23Y4");
if (isset($email, $username, $password, $confpassword)) {
	if (strstr($email, "@")) {
		if ($password == $confpassword) {

			$q     = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
			$query = $q->execute(array(
					$username,
					$email,
				));
			$count = $q->rowCount();

			if ($count == 0) {
				$q     = $conn->prepare("INSERT INTO users SET username = ?, email = ?, password = ?");
				$query = $q->execute(array(
						$username,
						$email,
						$password,
					));
				if ($query) {
					echo "<h1>Your account was create your can login to use search engine</h1>";
				}

			} else {

				echo "<h1>hey $username you're not alone</h1>";
			}

		} else {
			echo "<h1>your password must match </h1>";
		}

	} else {
		echo "<h1>Your adress mail is not availaible</h1>";
	}

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>simon backend</title>
	<link rel="stylesheet" type="text/css" href="script/styles2.css">
</head>
<body>



<div class="container">
  <header>
    <h2>Hetic seach engine , by Lionel Quellery</h2>
    <p>Go heticiens sign up hurry up !!</p>
  </header>
  <!-- / START Form -->
  <div class="form">
    <form action="inscription.php" method="POST">
      <div class="field">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="username">
      </div>
      <div class="field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="email" placeholder="email">
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="password">
      </div>
      <div class="field">
        <label for="rpassword">Repeat Password</label>
        <input id="rpassword" name="confpassword" type="password" placeholder="confirm password">
      </div>
      <button type="submit">Sign Up</button>
      <button ><a href="index.php">login</a></button>

    </form>
  </div>


  <!-- / END Form -->
  <footer>
    Made with
    <i class="fa fa-heart animated infinite pulse"></i>
    by
    <a href="http://lionelquellery.com">Lionel Quellery</a>
  </footer>
</div>
</body>
</html>