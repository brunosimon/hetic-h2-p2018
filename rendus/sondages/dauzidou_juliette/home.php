<?php
require 'inc/config.php';

	if(!empty($_POST))
		{
			$prepare = $pdo->prepare('INSERT INTO users (name,mail,password) VALUES (:name,:mail,:password)');
 
			$prepare->bindValue(':mail', $_POST['mail']);
			$prepare->bindValue(':password', $_POST['password']);
			$prepare->bindValue(':name', $_POST['name']);

			$prepare->execute();
		}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" type="text/css" href="src/css/style.css">
	</head>

	<body>
		<div class="header">
			<ul>
				<li><img class="logo" src="src/img/wheel.png"></li>
				<li><img class="logoname"src="src/img/mototo.png"`></li>
				<li class="line"> </li>
			</ul>
		</div>
		<div class="test">
		<div class="content">
			<form action="#" method="POST">
				<div>
		    		<input type="text" placeholder="name" name="name" id="name">
		    	</div>
					<br>
				<div>
		    		<input type="password" placeholder="password" name="password">
		    	</div>
		   			<br>
		    	<div>
		    		<input type="mail" name="mail" placeholder="mail">
		    	</div>
		    		<br>
				<div>
					<input class="submit" type="submit" name="submit" value="Sign-in">
				</div>
		    </form>
		</div>
		</div>

		<div class="footer">
			<ul>
				<p>Contact Us</p>
				<li><img class="fb" src="src/img/icon-social-facebook.png"></li>
				<li><img class="tw" src="src/img/icon-social-twitter.png"></li>
			</ul>
		</div>

	</body>
</html>	