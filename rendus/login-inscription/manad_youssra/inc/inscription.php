<?php

	require 'config.php';
	require 'error.php';
	//include 'inc/confirmationmail.php';

	if(!empty($_POST))
	{
		
		if($success)
		{

			$prepare = $pdo->prepare('INSERT INTO users (name,lastname,user_name,email,password) VALUES (:name,:lastname,:user_name,:email,:password)');

			$prepare->bindValue(':name',$_POST['name']);
			$prepare->bindValue(':lastname',$_POST['lastname']);
			$prepare->bindValue(':user_name',$_POST['user_name']);
			$prepare->bindValue(':email',$_POST['email']);
			$prepare->bindValue(':password',hash('sha256',PREFIX_SALT.SALT.$_POST['password'].SUFFIX_SALT));


			$prepare->execute();
		}
	}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Youssra Manad</title>
	<link rel="stylesheet" href="../src/style/style.css">
	<link rel="stylesheet" href="../src/style/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,700,300,600,400' rel='stylesheet' type='text/css'>
</head>
<body>

	
	<div class='register_img'></div>
	<div class="contain_form">
		<h1 id='welcoming'>We're glad you become part <br> of the family</h1>
		<form action="#" method="post">
			<label for="name" class='label'>Name</label> <br>
			<input type="text" name='name' id="name" value="<?php if(isset($_POST['name'])) { echo htmlentities($_POST['name']);}?>">
			<?php if(isset($errors['name'])){ ?>
				<p class='errors_fields'><?php echo $errors['name'] ?> </p>
			<?php } ?>
			<br>
			<label for="lastname" class='label'>Lastname</label> <br>
			<input type="text" name='lastname' id="lastname" value="<?php if(isset($_POST['lastname'])) { echo htmlentities($_POST['lastname']);}?>">
			<?php if(isset($errors['lastname'])){ ?>
				<p class='errors_fields'><?php echo $errors['lastname'] ?> </p>
			<?php } ?>
			<br>
			<label for="user_name" class='label'>User Name</label> <br>
			<input type="text" name='user_name' id="user_name" value="<?php if(isset($_POST['user_name'])) { echo htmlentities($_POST['user_name']);}?>">
			<?php if(isset($errors['user_name'])){ ?>
				<p class='errors_fields'><?php echo $errors['user_name'] ?> </p>
			<?php } ?>
			<br>
			<label for="email" class='label'>Email</label> <br>
			<input type="email" name='email' id="email" value="<?php if(isset($_POST['email'])) { echo htmlentities($_POST['email']);}?>">		
			<?php if(isset($errors['email'])){ ?>
				<p class='errors_fields'><?php echo $errors['email'] ?> </p>
			<?php } ?>
			<br>
			<label for='password' class='label'>Password</label> <br>
			<input type="password" name='password' id='password'>		
			<?php if(isset($errors['password'])){ ?>
				<p class='errors_fields'><?php echo $errors['password'] ?> </p>
			<?php } ?>
			<br>
			<label for = 'password_confirm' class='label'>Re-type Password</label> <br>
			<input type="password" name='password_confirm' id ='password_confirm'>		
			<?php if(isset($errors['password_confirm'])){ ?>
				<p class='errors_fields'><?php echo $errors['password_confirm'] ?> </p>
			<?php } ?>
			<br>
			<input type="submit" value="JOIN">
			<input type="reset" value="RESET FORM">
		</form>
		<p class='not_register'>YOU HAVE A ACCOUNT ?
		<a href="../index.php"><button class='btn_signup'>LOG IN</button></a>
	</div>
</body>
</html>