<?php
require 'inc/config.php';

	// echo '<p class="style_session.css">Hey, there !</p>';
	
	session_start ();

	// On récupère nos variables de session
	if (isset($_SESSION['pseudo'])) {

	
		echo 'Welcome'.$_SESSION['pseudo']. '. ';

	

		// On affiche un lien pour fermer notre session
		//echo '<a href="./logout.php">Déconnection</a>';
	}

	else {
		echo 'Les variables ne sont pas declarees. ';
	}

	if(!isset($_POST['remember'])){
	 $cookie_name = $_SESSION['pseudo'];
	 $cookie_value = "pseudo";
     setcookie($cookie_name, $cookie_value, time() + (60 * 60), "/"); 
     }

     else{
	 $cookie_name = $_SESSION['pseudo'];
	 $cookie_value = "pseudo";
     setcookie($cookie_name, $cookie_value, time() + (86400 * 120), "/"); 
     }

	if(empty($_SESSION['pseudo']))
	{
		header('Location:login.php');
		exit();
	}

  	if(!empty($_POST))
  	{
  		print_r($_POST);
		if($_POST['erase'] == 'on')
			{$_SESSION = array();
			if (ini_get("session.use_cookies")) 
				{
				    $params = session_get_cookie_params();
				    setcookie(session_name(), '', time() - 42000,
			        $params["path"], $params["domain"],
			        $params["secure"], $params["httponly"]
				    );
				  }  	
			}
		session_destroy();
		header('Location:login.php');
		exit();
	}
		



	// if(!isset($_COOKIE[$cookie_name])) {
	//     echo " Cookie named '" . $cookie_name . "' is not set!";	
	// } else {
	//     echo " Cookie '" . $cookie_name . "' is set!<br>";
	//     echo " Value is: " . $_COOKIE[$cookie_name];
	// }


	// Détruit toutes les variables de session
	//$_SESSION = array();



	// Finalement, on détruit la session.
	//session_destroy();
	?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Session</title>	
	<link rel="stylesheet" type="text/css" href="src/css/style_session.css">
</head>
<body>
	<h1>What's up ?</h1>


	<a href="http://euw.leagueoflegends.com/en/news/riot-games/announcements/rp-price-adjustment-europe">
		<img src="src/img/img1.jpg" alt="image" >
		Riot Games announced rp prices adjustments in Europe, check that.
	</a>

	<a href="http://euw.leagueoflegends.com/en/news/game-updates/features/team-and-earn-party-rewards">
		<img src="src/img/img2.jpg" alt="image" style="width:50%;border:0">
		Team up and earn Party Rewards!
	</a>

		<a href="http://euw.leagueoflegends.com/en/news/riot-games/announcements/spectatefaker-what-we-learned-and-what-well-do">
		<img src="src/img/img3.jpg" alt="image" style="width:50%;border:0">
		SpectateFaker - what we learned and what we’ll do
	</a>

	<form action="#" method="POST">
		<div>
	  		<input type="checkbox" name="erase" id="erase"> 
			<label for="erase" class="erase">Disconnect</label>
		</div>
		<input type="submit">
	</form>

		
</body>
</html>