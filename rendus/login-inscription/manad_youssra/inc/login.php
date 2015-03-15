<?php 
	
	require 'config.php';
	//Show errors
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);

	if(!empty($_POST)){
		$prepare = $pdo->prepare('SELECT * FROM users WHERE user_name = :user_name');
		$prepare->bindValue(':user_name',$_POST['user_name']);
		$prepare->execute();
		$users = $prepare->fetch();
		if(!$users)
		{
			$errors = "User name not registered";		
		}
		else
		{
			if($users->password == hash('sha256',PREFIX_SALT.SALT.$_POST['password'].SUFFIX_SALT))
			{
				$_SESSION['session_name'] = $users->name;
				$_SESSION['session_lastname'] = $users->lastname;

				if(isset($_POST['remember'])){
					$user_name = $_POST['user_name'];
					setcookie('user_name',$user_name,time()+60*10);
				}
				header('Location: member_page.php');
			}
			else
			{
				$errors = 'Re-Try';
			}
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
	
	<div class='intro_img'></div>
	<div class="contain_form">
		<h1 id='welcoming'>Welcome aboard Sir,</h1>
		<form action="#" method="post">

			<input type="text" name='user_name' id="user_name" placeholder='USER ID'>
			<?php if(isset($errors)){ ?>
				<p class='errors_fields'><?php echo $errors ?> </p>
			<?php } ?>
			<br>
			<input type="password" name='password' placeholder='PASSWORD'>		
			<br>
			<input type="checkbox" name='remember'>
			<label class='remember_box'>Remember me</label>
			<br>
			<input type="submit" value="LOGIN">
		</form>
		<p class='not_register'>NOT REGISTERED YET ?</p>
		<a href="../index.php"><button class='btn_signup'>SIGN UP</button></a>
	</div>
</body>
</html>