<?php 

	require 'INC/config.php';

	if(!empty($_POST)) {
		$prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
		$prepare->bindValue(':mail',$_POST['mail']);
		$prepare->execute();
		$user = $prepare->fetch();

		if(empty($_POST['mail'])) {
			$errors['validation'] = 'rentre au moins ton adresse.'; 
		}
		else {
			if(!$user) {
				$errors['validation'] = 'c pa ton adres voleur';            
			}
			else {
				if($user->password == hash('sha256', SALT.$_POST['password'])) {
					$errors['validation'] = '';             
				}
				else {
					$errors['validation'] = 'c pa ton pass hacker';
				}
			}   
		}

		if($user->password == hash('sha256', SALT.$_POST['password'])) {
			session_start();
			$_SESSION['user'] = $user->name;
			$_SESSION['login'] = 1;
			header('Location:private.php');
		}
	}

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="css/style.css" rel="stylesheet">
	<link href=
	'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,800,700,600,300'
	rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="leftside">
		<h1>Login<span>.</span></h1>

		<form action="#" method="post">
			<input class="mail" name="mail" placeholder="Mail" type="text"
			value=
			"<?php if (isset($_POST['mail'])){echo $_POST['mail'];} ?>"><br>
			<input class="password" name="password" placeholder="Password"
			type="text" value=
			"<?php if (isset($_POST['password'])){echo $_POST['password'];} ?>">
			<br>
			<button style=
			"border: 0; background: transparent; margin-top: 35px;" type=
			"submit"><img alt="submit" class="submit_img" src=
			"css/img/submit.png"></button>
		</form>
	</div>

	<div class="rightside">
		<div class="wp3"></div>

		<div class="wp4"></div>
	</div><?php if(empty($_POST)) echo '<div class="lol">' ?><?php if(!empty($_POST)) echo '<div class="notification">' ?>

	<h1>Bon, frer<span>...</span></h1>

	<p><?= ($errors['validation']) ? $errors['validation'] : ' '  ?>
	</p>

	<div class="close"><img class="close_img" src=
	"css/img/close.png"></div><script type="text/javascript">

	var       rightside = document.querySelector('.rightside'),
	mail = document.querySelector('.mail'),
	pass = document.querySelector('.password'),
	sub_img = document.querySelector('.submit_img'),
	close_img = document.querySelector('.close_img'),
	notif = document.querySelector('.notification'),
	form = document.querySelector('form');

	mail.addEventListener("focusin", focusFunction1, true);
	function focusFunction1() {
			rightside.style.transform = "translateY(0%)";
	}

	pass.addEventListener("focusin", focusFunction2, true);
	function focusFunction2() {
			rightside.style.transform = "translateY(-100%)";
	}

	sub_img.addEventListener("mouseover", changeSrc, true);
	function changeSrc() {
			sub_img.src = 'css/img/submit_h.png';
	}

	sub_img.addEventListener("mouseout", changeSrc2, true);
	function changeSrc2() {
			sub_img.src = 'css/img/submit.png';
	}

	close_img.addEventListener("mouseover", changeSrc3, true);
	function changeSrc3() {
			close_img.src = 'css/img/close_h.png';
	}

	close_img.addEventListener("mouseout", changeSrc4, true);
	function changeSrc4() {
			close_img.src = 'css/img/close.png';
	}

	close_img.addEventListener("click", close, true);
	function close() {
			notif.style.display = 'none';
	}

	</script>
</body>
</html>
