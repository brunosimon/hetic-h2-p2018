<?php
session_start();
include ("script/connect.php");
if (isset($_POST['username'], $_POST['password'])) {

	$query = $conn->prepare("SELECT username, password FROM users WHERE username=:username AND password=:password");
	$query->bindParam(':username', $_POST['username']);
	$query->bindParam(':password', sha1($_POST['password']."AZERTY23Y4"));
	$query->execute();

	if ($row = $query->fetch()) {
		$_SESSION['username'] = $row['username'];
		header("Location:http://lionelquellery.com/hetic/");
	} else {
		echo "error";
	}
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
    <form action="index.php" method="post">

      Name<br>
<input type="text" name="username" /><br>
      Password<br>
<input type="password" name="password" /><br>
<input type="submit" value="Login" class="link-lostpass"/>
      <button ><a href="inscription.php">Sign Up</a></button>

      <div>
      </div>
    </form>
  </div>
  <footer class="section-footer">
    <a href="http://lionelquellery.com/labs/login/reset.php" class="link-lostpass">I've lost my password</a>

  </footer>
</section>
</body>
</html>


<!-- site pour aide
http://php.net/manual/fr/
http://openclassrooms.com/forum/sujet/verification-base-de-donnees-php-pdo
http://forum.phpfrance.com/
http://jean.yard.pagesperso-orange.fr/sitelycee/cours/php/_PHP.html?Construiredesrequtesenfonctionde.html -->
