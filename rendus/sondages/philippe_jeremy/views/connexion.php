<?php 
require '../inc/config.php';


if(!empty($_POST)){
	define('SALT', 'zwqx(rd_v,jiao;k)p:l=^m');

	$prepare= $pdo->prepare('SELECT * FROM users WHERE login = :login LIMIT 1');

	$prepare->bindValue(':login', $_POST['login']);

	$query = $prepare->execute();
	$user = $prepare->fetch();

	if($user->password == hash('sha256',$_POST['password'].SALT)){
		$_SESSION['login']= $_POST['login'];
		$_SESSION['logged']= true;
	}
}


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Connexion</title>
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/style.css"> 	
 </head>
 <body>
 <?php include '../partials/menu.php' ?>

 	<form method="POST" class="connect_form">
 		<label for="login">Login :
 			<input type="text" name="login" class="connect_input">
 		</label>
 		<br>
		<label for="password">Password :
			<input type="password" name="password" class="connect_input">
		</label>
		<br>
		<input type="submit" value="Connexion" class="connect_submit">
 	</form>
 	<?php if(isset($_SESSION)){ ?>
 		<div class="welcome">Bonjour <?php $_SESSION['login'] ?>, nous sommes ravis de vous avoir parmi nous.
		Une question à poser ? <a href="../index.php"> Rien de plus simple</a></div>
	<?php }else if($user->password !== hash('sha256',$_POST['password'].SALT)){ ?>
		<div class="not_welcome">Une erreur est survenue, veuillez vérifier vos identifiants de connexion et recommencer.</div>
	<?php } ?>		
 </body>
 </html>