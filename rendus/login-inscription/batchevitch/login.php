<?php
require 'inc/config.php';

$errors = false;
$errorMsg = "Sorry this Pony Name / Password combination does not exist.";
$saltCheck = "";

// Since I don't know how to retrieve USER IP - I'll use this snippet
$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
	$ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
	$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
	$ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
	$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
	$ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('HTTP_X_CLUSTER_CLIENT_IP'))
	$ipaddress = getenv('HTTP_X_CLUSTER_CLIENT_IP');
else if(getenv('REMOTE_ADDR'))
	$ipaddress = getenv('REMOTE_ADDR');
else
	$ipaddress = '127.0.0.1';

//Let's check if user has already been here (cookies!) and checked remember me
if(!empty($_COOKIE['rememberme'])){
	$digest = $_COOKIE['rememberme'];
	$cookieCheck = $pdo->prepare('SELECT pname FROM users WHERE rememberme="'.$digest.'"');
	$cookieCheck->execute();
	$digest = $cookieCheck->fetch();

	if($digest){
		session_start();
		$_SESSION["loggedin"] = "yes";
		header("Location: homepage.php");
	}
}

if(!empty($_POST)){ //Verification: formulaire vide?

	$pname = $_POST['pname'];
	$password = $_POST['password'];

	$prepare = $pdo->prepare("SELECT * FROM users WHERE pname ='".$pname."' LIMIT 1");
	$prepare->execute();
	$user = $prepare->fetch();



	if(!$user){
		$errors = true;
	}
	else {
		// Let's take the salt code from DB
		$saltCheck = $user->hashsalt;
		// is user and password matching ?
		if($user->password == hash('sha256',$saltCheck.$password)){
			// has user validated their account through the validation link?
			if($user->active == 1){

				//We add a session to say user is logged in so he can access the homepage.php
				session_start();
				$_SESSION["loggedin"] = "yes";

				// is remember me checked?
				if(!empty($_POST['remember']) && $_POST['remember']  == '1'){

					//We could use a session just like logged but I want to show I can also do kind of secure cookies
					//Let's do a special technic called DIGEST to encrypt our cookie later on... Here let's that create a special value
					$digest = hash('sha256', COOKIE_SALT.$pname.COOKIE_SALT);

					//Let's update our DB accordingly
					$prepare = $pdo->prepare('UPDATE users SET rememberme="'.$digest.'" WHERE pname="'.$pname.'"');
					$prepare->bindValue('pname',$pname);
					$prepare->bindValue('remember',$digest);
					$prepare->execute();

					setcookie('rememberme', $digest, time()+60*60*24*7);

				}
				//User has failed login attempts? Let's set that to 0 since he remembered his password
				$prepare = $pdo->prepare('SELECT * FROM log WHERE (pname=:pname AND IP=:ip)');
				$prepare->bindValue('pname',$pname);
				$prepare->bindValue('ip',$ipaddress);
				$prepare->execute();
				$user = $prepare->fetch();

				//User in DB?
				if($user){
					$prepare = $pdo->prepare('UPDATE log SET attempts=0 WHERE pname = :pname AND IP = :ip');
					$prepare->bindValue('pname',$pname);
					$prepare->bindValue('ip',$ipaddress);
					$prepare->execute();
				}

				//Redirection to member's page
				header("Location: homepage.php");
			}

			else {
				$errorMsg = "Looks like you haven't activated your account through the link we've sent you.";
				$errors = true;
			}


		}
		else {

			//Password is wrong, if users fails 3 times, they'll need to wait
			$prepare = $pdo->prepare('SELECT * FROM log WHERE (pname=:pname AND IP=:ip)');
			$prepare->bindValue('pname',$pname);
			$prepare->bindValue('ip',$ipaddress);
			$prepare->execute();
			$user = $prepare->fetch();


				//User with this IP already in DB?
			if($user){
						//check if this IP has been blocked because of too many attempts?
				if($user->blocked == 1){
					header("Location: index.html");
				}

						// Not blocked? Ok let's add 1 to your number of total attempts
				$attempts = 1 + $user->attempts;
				$prepare = $pdo->prepare('UPDATE log SET attempts= :attempts WHERE pname = :pname AND IP = :ip');
				$prepare->bindValue('attempts',$attempts);
				$prepare->bindValue('pname',$pname);
				$prepare->bindValue('ip',$ipaddress);
				$prepare->execute();

						//This is your 3rd attempt? I guess you'll have to wait attempts * 2 seconds 
				if ($attempts > 2) {
					$errors = true;
					$time = $attempts*2;
					$errorMsg = "You typed the wrong password too many times... You had to wait ".$time." seconds. Timer will reset upon correct login.";
					sleep($attempts*2);
				}

						//block IP after 20 tries because suspicious
				if ($attempts > 20) {
					$prepare = $pdo->prepare('UPDATE log SET blocked="1" WHERE pname="'.$pname.'"');
					$prepare->execute();
				}

			}

			else {

					//New user? Let's add him and IP to DB
				$prepare = $pdo->prepare('INSERT INTO log(pname,IP,attempts) VALUES (:pname,:IP,:attempts) ');
				$prepare->bindValue('pname',$pname);
				$prepare->bindValue('IP',$ipaddress);
				$prepare->bindValue('attempts',1);
				$prepare->execute();
			}

			$errors = true;
		}
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyLittleForm - Login</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="back">
		<a href="index.html">Back</a>
	</div>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<fieldset>

			<legend>
				Login
			</legend>
			<?PHP
			if($errors) {
				echo "<p style=\"color: red;\">",htmlspecialchars($errorMsg),"</p><br>\n\n";
			}
			?>
			<input type="text" name="pname" placeholder="Pony Name">
			<br>
			<input type="password" name="password" placeholder="Password">
			<br>
			<label>
				<input type="checkbox" name="remember" value="1">Remember Me
			</label>
			<br>
			<input type="submit" value="Login!">
			<br><br>
			<a href="forgot.php">Forgot your password?</a>
		</fieldset>
	</form>

</body>
</html>