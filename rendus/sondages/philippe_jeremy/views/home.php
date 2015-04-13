<?php

	/*$new_question= $_POST['question'];*/
	
	$regex_question= preg_match('/^[A-Z]\?$/', $new_question)? true : false;
	
	//Ajouter une question
	if(!empty($_POST)){
		$new_question= $_POST['question'];
		if($regex_question){
			if(isset($_SESSION)){ //vérification utilisateur connecté
				//requête SQL, nouvelle entrée dans table sondages
				$prepare= $pdo->prepare("INSERT INTO sondages (login, question, value1, vote1, value2, vote2) VALUES (:login, :question, 'YES', 0, 'NO', 0)");
				$prepare-> bindValue('question', $_POST['question']);
				$prepare-> bindValue('login', $_SESSION['login']);
				$prepare-> execute();
				header('Location : devoir_sondage/home.php');
			}//else dans l'html
		}//else dans l'html
	}

	//Get all sondages.
	$query= $pdo->query('SELECT * FROM sondages');
	$sondages= $query->fetchAll();

	//Vote v1 //OK
	if(isset($_SESSION)){
		if(!empty($_GET['vote1']) && !isset($sondage_cookie)){
			$prepare= $pdo->prepare("UPDATE sondages SET vote1= vote1 + 1 WHERE id= :id");
			$prepare->bindValue('id', $_GET['vote1']);
			$prepare-> execute();
			setcookie('sondage_cookie', "VOTE", time()+24*60*60, "/");
		}
	}

	//Vote 2  //OK
	if(isset($_SESSION)){
		if(!empty($_GET['vote2']) && !isset($sondage_cookie)){
			$prepare= $pdo->prepare("UPDATE sondages SET vote2= vote2 + 1 WHERE id= :id");
			$prepare->bindValue('id', $_GET['vote2']);
			$prepare-> execute();
			setcookie('sondage_cookie', "VOTE", time()+24*60*60, "/");
		}	
	}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Sondage</title>
 	<link rel="stylesheet" href="css/reset.css">
 	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 <?php require 'partials/menu.php' ?>
 
 <div class="new_sondage">
 	<h1>Les sondages ne vous auront jamais paru aussi simples.</h1>
 	<form method="POST">
 		<input type="text" class='input_question' name="question" placeholder="Est-ce que votre blanquette est bonne ?">
		<input type="submit" value="Poser une question">
	</form>
	<?php if(!empty($_POST)){ if(!isset($_SESSION)){ ?>
		<div class="no_connect">
			Vous devez vous <a href="partials/connexion.php">connecter</a> pour poster un sondage.
 		</div>
 	<?php }else if(!$regex_question){?>
		<div class="no_connect">
			Veuillez commencer votre question par une majuscule et la terminer par un point d'interrogation.
		</div>
 	<?php } } ?>	
 </div>
 <div class="corpus">
 	<?php foreach ($sondages as $_sondage): ?>
	 	<div class="sondage">	
		 	<div class="question"><?= $_sondage->question ?></div>
		 	<div class="author">de <?= $_sondage->login ?></div>
		 	<?php if(isset($_COOKIE['sondage_cookie']) && $_COOKIE['sondage_cookie'] == "VOTE"){ ?>
 				<div class="choice">
 					<div class="value"><?= $_sondage->value1 ?></div>
 					<div class="result"><?= $_sondage->vote1 ?></div>
 				</div>
				 <div class="choice">
				 	<div class="value"><?= $_sondage->value2 ?></div>
				 	<div class="result"><?= $_sondage->vote2 ?></div>
				 </div>
 			<?php }else{ ?>
		 		<a href="?vote1=<?=$_sondage->id ?>">
					<div class="choice">
						<div class="eyes"></div>
						<div class="tohide"></div>
						<div class="<?= $_sondage->value1 ?>"></div>
					</div>
		 		</a>
		 		<a href="?vote2=<?=$_sondage->id ?>">
					<div class="choice">
						<div class="eyes"></div>
						<div class="tohide"></div>
						<div class="<?= $_sondage->value2 ?>"></div>
					</div>
		 		</a>
	 		<?php } ?>
	 	</div>
	 <?php endforeach; ?>	
 </div>
 </body>
 <script src="js/jquery-src.js"></script>
 <script src="js/script.js"></script>
 </html>
	