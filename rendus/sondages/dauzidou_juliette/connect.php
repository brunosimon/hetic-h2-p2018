<?php 
// show errors
error_reporting(E_ALL); 
ini_set("display_errors", 1);

require 'inc/config.php';

if(!empty($_POST))
	{
		$prepare = $pdo->prepare('SELECT * FROM users WHERE name = :name LIMIT 1');
		$prepare->bindValue(':name',$_POST['name']);
		$prepare->execute();
		$user = $prepare->fetch();
		if(!$user)
		{
			echo 'User not found';
		}
		else
		{
			if($user->password == $_POST['password'])
			{
				echo 'You shall pass';
			}
			else
			{
				echo 'You shall not pass';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Connect</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" type="text/css" href="src/css/connect.css">
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
		<div class="content">''
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