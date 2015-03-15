<?php 

	require 'INC/config.php';

	error_reporting(E_ALL);
	ini_set('display_erros', 1);

	if(!empty($_POST))
	{

			$prepare = $pdo->prepare('SELECT  mail FROM users WHERE mail = :mail ');
			
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->execute();
			$mail=$prepare->fetch();

			$prepare = $pdo->prepare('INSERT INTO users (name,surname,mail,password,confirm_password,phone,country,city,age) VALUES (:name,:surname,:mail,:password,:confirm_password,:phone,:country,:city,:age) ');
			
			$prepare->bindValue(':name',$_POST['name']);
			$prepare->bindValue(':surname',$_POST['surname']);
			$prepare->bindValue(':mail',$_POST['mail']);
			$prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
			$prepare->bindValue(':confirm_password',hash('sha256',SALT.$_POST['confirm_password']));
			$prepare->bindValue(':phone',$_POST['phone']);
			$prepare->bindValue(':country',$_POST['country']);
			$prepare->bindValue(':city',$_POST['city']);
			$prepare->bindValue(':age',$_POST['age']);
	}

	$error=false;

	//Password confirmation

	if($_POST['password'] != $_POST['confirm_password']){
		$error=true;
		$errors['confirm_password'] = 'Ton mot de passe, tu l\'as mal confirmé.';
	}

	//User already in DBB

	if(!empty($_POST['mail'])){
		if($mail) {
			$error=true;
			$errors['mail'] = 'Ton email, il existe déjà.';
		}
	}

	//Password length check

	if(strlen($_POST['password']) < 8 || strlen($_POST['password']) >16 )
		{
			$error=true;
			$errors['password'] = 'Ton mot de passe, il est trop court';
		}

	//User too young

	if($_POST['age'] < 18)
		{
			$error=true;
			$errors['age'] = 'T\'as pas l\'âge.';
		}

	//Password not enought complex

	function valid_pass($candidate) {
			if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $candidate))
					return false;
			return true;
	}

	$password = $_POST['password'];
	if(valid_pass($_POST['password']))
			$errors['password'] = '';
	else {
		$errors['password'] = 'Ton mot de passe, plus complexe stp.';
		$error=true;
	}

	//Name length

	if(strlen($_POST['name']) < 2 )
		{
			$error=true;
			$errors['name'] = 'Ton nom, mets le vrai stp.';
		}

	//Surname length

	if(strlen($_POST['surname']) < 3 )
		{
			$error=true;
			$errors['surname'] = 'Ton prénom, mets le vrai stp.';
		}

	//Mail adress syntax

	$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';  
	$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; 
	$regex = '/^' . $atom . '+' .'(\.' . $atom . '+)*' . '@' . '(' . $domain . '{1,63}\.)+' . $domain . '{2,63}$/i';          

	$email = $_POST['mail'];
	if (preg_match($regex, $email)) 
			$errors['mail'] = '';
	else {
		$errors['mail'] = 'Ton email, il est pas halal.';
		$error=true;
	}

	//Phone number synthax

	if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['phone']))
				$errors['phone'] = '';
		else {
			$errors['phone'] = $_POST['phone'] . 'c\'est pas halal cousin.';
			$error=true;
		}

	//Sends data if all criters are valids

	if ($error == false) {
		$errors['validation'] = 'c\'est bon, va te <a href="login.php">logger</a>.';
		$prepare->execute();
	}


?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Inscription</title>
	<link href="css/style.css" rel="stylesheet">
	<link href=
	'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,800,700,600,300'
	rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="leftside">
		<h1>Inscription<span>.</span></h1>

		<div class="form">

			<!-- FORMULAIRE -->
			<form action="#" method="post">

				<!-- NAME -->
				<input class="name" name="name" placeholder="Name" type="text"
				value=
				"<?php if (isset($_POST['name'])){echo $_POST['name'];} ?>"><br>

				<!-- SURNAME -->
				<input class="surname" name="surname" placeholder="Surname"
				type="text" value=
				"<?php if (isset($_POST['surname'])){echo $_POST['surname'];} ?>">
				<br>

				<!-- MAIL -->
				<input class="mail" name="mail" placeholder="Mail" type="text"
				value=
				"<?php if (isset($_POST['mail'])){echo $_POST['mail'];} ?>"><br>
				
				<!-- PASSWORD -->
				<input class="password" name="password" placeholder="Password"
				type="password" value=
				"<?php if (isset($_POST['password'])){echo $_POST['password'];} ?>">
				<br>

				<!-- CONFIRMATION -->
				<input class="confirmation" name="confirm_password"
				placeholder="Confirmation" type="password" value=
				"<?php if (isset($_POST['confirm_password'])){echo $_POST['confirm_password'];} ?>">
				<br>

				<!-- PHONE -->
				<input class="phone" name="phone" placeholder="Phone" type=
				"text" value=
				"<?php if (isset($_POST['phone'])){echo $_POST['phone'];} ?>"><br>
				
				<!-- COUNTRY -->
				<input class="country" name="country" placeholder="Country"
				type="text" value=
				"<?php if (isset($_POST['country'])){echo $_POST['country'];} ?>">
				<br>

				<!-- CITY -->
				<input class="city" name="city" placeholder="City" type="text"
				value=
				"<?php if (isset($_POST['city'])){echo $_POST['city'];} ?>"><br>
				
				<!-- AGE -->
				<input class="age" name="age" placeholder="Age" type="number"
				value=
				"<?php if (isset($_POST['age'])){echo $_POST['age'];} ?>"><br>

				<!-- SUBMIT -->
				<button style=
				"border: 0; background: transparent; margin-top: 35px;" type=
				"submit"><img alt="submit" class="submit_img" src=
				"css/img/submit.png"></button>

			</form>
		</div>

		<!-- SCROLL BUTTON -->
		<button style=
		"border: 0; background: transparent; margin-top: 35px;"><img class=
		"next_prev" src="css/img/nextprev.png"></button>

	</div>

	<div class="rightside">
		<div class="wp1"></div>

		<div class="wp2"></div>

		<div class="wp3"></div>

		<div class="wp4"></div>

		<div class="wp5"></div>

		<div class="wp6"></div>

		<div class="wp7"></div>

		<div class="wp8"></div>

		<div class="wp9"></div>
	</div><?php if(empty($_POST)) echo '<div class="lol">' ?><?php if(!empty($_POST)) echo '<div class="notification">' ?>

	<h1>Bon, frer<span>...</span></h1>

	<p><?= ($errors['name']) ? $errors['name'] : ' '  ?>
	</p>

	<p><?= ($errors['surname']) ? $errors['surname'] : ' '  ?>
	</p>

	<p><?= ($errors['mail']) ? $errors['mail'] : ' '  ?>
	</p>

	<p><?= ($errors['password']) ? $errors['password'] : ' '  ?>
	</p>

	<p>
	<?= ($errors['confirm_password']) ? $errors['confirm_password'] : ' '  ?>
	</p>

	<p><?= ($errors['phone']) ? $errors['phone'] : ' '  ?>
	</p>

	<p><?= ($errors['country']) ? $errors['country'] : ' '  ?>
	</p>

	<p><?= ($errors['city']) ? $errors['city'] : ' '  ?>
	</p>

	<p><?= ($errors['age']) ? $errors['age'] : ' '  ?>
	</p>

	<p><?= ($errors['validation']) ? $errors['validation'] : ' '  ?>
	</p>

	<div class="close"><img class="close_img" src=
	"css/img/close.png"></div><script type="text/javascript">

	var       rightside = document.querySelector('.rightside'),
	name1 = document.querySelector('.name'),
	surname = document.querySelector('.surname'),
	mail = document.querySelector('.mail'),
	pass = document.querySelector('.password'),
	confirmation = document.querySelector('.confirmation'),
	age = document.querySelector('.age'),
	phone = document.querySelector('.phone'),
	country = document.querySelector('.country'),
	city = document.querySelector('.city'),
	sub_img = document.querySelector('.submit_img'),
	close_img = document.querySelector('.close_img'),
	notif = document.querySelector('.notification'),
	form = document.querySelector('form'),
	nextprev = document.querySelector('.next_prev');


	name1.addEventListener("focusin", focusFunction1, true);
	function focusFunction1() {
			rightside.style.transform = "translateY(0%)";
	}

	surname.addEventListener("focusin", focusFunction2, true);
	function focusFunction2() {
			rightside.style.transform = "translateY(-100%)";
	}

	mail.addEventListener("focusin", focusFunction3, true);
	function focusFunction3() {
			rightside.style.transform = "translateY(-200%)";
	}

	pass.addEventListener("focusin", focusFunction4, true);
	function focusFunction4() {
			rightside.style.transform = "translateY(-300%)";
	}

	confirmation.addEventListener("focusin", focusFunction5, true);
	function focusFunction5() {
			rightside.style.transform = "translateY(-400%)";
	}

	phone.addEventListener("focusin", focusFunction6, true);
	function focusFunction6() {
			rightside.style.transform = "translateY(-500%)";
	}

	country.addEventListener("focusin", focusFunction7, true);
	function focusFunction7() {
			rightside.style.transform = "translateY(-600%)";
	}

	city.addEventListener("focusin", focusFunction8, true);
	function focusFunction8() {
			rightside.style.transform = "translateY(-700%)";
	}

	age.addEventListener("focusin", focusFunction9, true);
	function focusFunction9() {
			rightside.style.transform = "translateY(-800%)";
	}




	var counter = 1;
	nextprev.addEventListener("click", onclickFunction1, true);
	function onclickFunction1() {
		if(counter == 1) {
			form.style.transform = "translateY(-314px)";
				nextprev.style.transform = "rotate(180deg)";
				counter = 0;
		}
		else {
			form.style.transform = "translateY(0px)";
				nextprev.style.transform = "rotate(0deg)";
				counter = 1;
		}
			
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