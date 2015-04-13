<?php
require 'inc/config.php';

if(isset($_POST['choice'])){

	if($_POST['choice'] == 'moto')
		$vote = 0;
	else if ($_POST['choice'] == 'scoot')
		$vote = 1;

	$req = $pdo->prepare('SELECT COUNT(*) AS nbr FROM votes WHERE ip = :ip');
	$req->bindValue(":ip", $_SERVER['REMOTE_ADDR']);
	$req->execute();
	$data = $req->fetch();

	if($data->nbr == 0) {
		//Preparing Insertion
		$prepare = $pdo->prepare('INSERT INTO votes (vote, ip) VALUES (:vote, :ip)');

		//Binding Values
		$prepare->bindValue (":vote", $vote);
		$prepare->bindValue (":ip", $_SERVER['REMOTE_ADDR']);

		//Executing Request
		$prepare->execute();
	}

	function count_vote($vote){
		
		global $pdo;

		if($vote == 'moto')
			$value = 0;
		else if ($vote == 'scoot')
			$value = 1;

		$count = $pdo->query('SELECT COUNT(*) FROM votes WHERE vote ='.$value)->fetchColumn();

		return $count;

	}

	$moto_score = count_vote('moto');
	$scoot_score = count_vote('scoot');

	$total_count = $moto_score + $scoot_score;

	// echo '<pre>';
	// print_r($moto_score);
	// echo '</pre>';
	// echo '<pre>';
	// print_r($scoot_score);
	// echo '</pre>';
	// exit;

	$percent_moto = round(($moto_score * 100) / $total_count);
	$percent_scoot = round(($scoot_score * 100) / $total_count);

}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sondage</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" type="text/css" href="src/css/sondage.css">
	</head>

	<body>
		<div class="header">
			<ul>
				<li><img class="logo" src="src/img/wheel.png"></li>
				<li><img class="logoname"src="src/img/mototo.png"`></li>
				<li class="line"> </li>
			</ul>
		</div>
		
		<div class="scoreMoto">
			<h1> Moto </h1>
			<?php
				if(isset($_POST['choice']))
			 		echo $percent_moto.'%';
				?>
		</div>
		<div class="scoreScoot">
			<h1> Scoot </h1>
			<?php 
				if (isset($_POST['choice']))
					echo $percent_scoot.'%'; 
			?>
		</div>
		
		<div class="sondage">	
				<p class="question"> What do you prefer ? </p>
			<ul>
				<form action="#" method="post">    	
					<li class="first"> 
						<label>
							<input type="radio" name="choice" value="moto"> <img class="imageMoto" src="src/img/motocool.png">
						</label>
					</li>
					<li class="second">
						<label>
							<input type="radio" name="choice" value="scoot"> <img class="imageScoot" src="src/img/scootcool.png">
						</label>
					</li>
							<input type="submit" value="click here to valid">
				</form>
			</ul>
			
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