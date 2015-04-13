<?php
require 'inc/config.php';

/*** Input values ***
1 -> dev
2 -> designer
3 -> marketeur
4 -> branleur
 *********************/

// On recupère les questions
$prepare = $pdo->prepare('SELECT * FROM questions');
$prepare->execute();
$questions = $prepare->fetchAll();

// Fonction qui melange l'ordre des questions
function randomOrder($item) {
	$shuffledItem = [
		[1, $item["reponse_developpeur"]],
		[2, $item["reponse_designer"]],
		[3, $item["reponse_marketeur"]],
		[4, $item["reponse_branleur"]]
	];
	shuffle($shuffledItem);
	return $shuffledItem;
}

// Au moins un des champs du quizz a été complété
if (!empty($_POST)) {

	// Verif champs rempli questions
	if (!isset($_POST["question_0"]) || !isset($_POST["question_1"]) || !isset($_POST["question_2"]) || !isset($_POST["question_3"]) || !isset($_POST["question_4"]) || !isset($_POST["question_5"]) || !isset($_POST["question_6"])) {
		$status = '<div class="alert alert-small alert-danger">Au moins une question n\'a pa été répondu</div>';
	}

	// Verif champs rempli utilisateur
	 else if (!isset($_POST["pseudo"]) || !isset($_POST["email"])) {
		$status = '<div class="alert alert-small alert-danger">Vous n\'avez pas précisé votre pseudo et/ou votre adresse email</div>';
	} else {

		// Verif taille pseudo
		if (strlen($_POST["pseudo"]) < 8) {
			$status = '<div class="alert alert-small alert-danger">Le pseudo doit contenir au minimum 8 caractères</div>';
		}

		// Verif email
		 else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$status = '<div class="alert alert-small alert-danger">L\'adresse mail saisi n\'est pas valide</div>';
		}

		// Verif disponibilité pseudo
		 else {
			$prepare = $pdo->prepare('SELECT * FROM utilisateurs WHERE pseudo=:pseudo LIMIT 1');
			$prepare->bindValue(':pseudo', $_POST["pseudo"]);
			$prepare->execute();
			$pseudoExist = $prepare->fetch();
			if ($pseudoExist) {
				$status = '<div class="alert alert-small alert-danger">Le pseudo est déjà utilisé</div>';
			}

			// Verif disponibilité email
			 else {
				$prepare = $pdo->prepare('SELECT * FROM utilisateurs WHERE email=:email LIMIT 1');
				$prepare->bindValue(':email', $_POST["email"]);
				$prepare->execute();
				$mailExist = $prepare->fetch();
				if ($mailExist) {
					$status = '<div class="alert alert-small alert-danger">L\'adresse mail est déjà utilisée</div>';
				} else {

					// Calcul du resultat
					$reponses        = [$_POST["question_0"], $_POST["question_1"], $_POST["question_2"], $_POST["question_3"], $_POST["question_4"], $_POST["question_5"], $_POST["question_6"]];
					$compterReponses = [
						"developpeur" => 0,
						"designer"    => 0,
						"marketeur"   => 0,
						"branleur"    => 0
					];
					foreach ($reponses as $reponse) {
						if ($reponse == 1) {
							$compterReponses["developpeur"]++;
						} else if ($reponse == 2) {
							$compterReponses["designer"]++;
						} else if ($reponse == 3) {
							$compterReponses["marketeur"]++;
						} else if ($reponse == 4) {
							$compterReponses["branleur"]++;
						}
					}
					$max = max($compterReponses);
					$max = array_keys($compterReponses, $max);
					if (sizeOf($max) > 1) {
						$resultat = "pluridisciplinaire";
					} else {
						$resultat = $max[0];
					}

					// Enregistrement du score dans la base de donnée
					$prepare = $pdo->prepare('INSERT INTO utilisateurs (pseudo, email, resultat) VALUES (:pseudo, :email, :resultat)');
					$prepare->bindValue(':pseudo', $_POST["pseudo"]);
					$prepare->bindValue(':email', $_POST["email"]);
					$prepare->bindValue(':resultat', $resultat);
					$prepare->execute();
					$status = '<div class="alert alert-small alert-success">Vous etes un <b>'.$resultat.'</b>. <a href="index.php">Retour à l\'accueil</a></div>';
				}
			}
		}
	}
}

// Affichage du formulaire
 else {

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quizz</title>

    <!-- CSS -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- JS -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
	<section id="jeu-quizz">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

<?php if (isset($status)) {echo $status;
}
?>
<form action="jeu.php" method="post">

                        <!-- Quizz -->
<?php foreach ($questions as $key => $item):?>
                        	<fieldset>

                            	<legend class="question"><?=$item["question"]?></legend>

<?php foreach (randomOrder($item) as $shuffledItem):?>

	                            	<div class="radio">
	                             		<label>
	                                		<input value="<?=$shuffledItem[0]?>" type="radio" name="question_<?=$key?>" <?php if (isset($_POST["question_".$key])) {if ($_POST["question_".$key] == $shuffledItem[0]) {echo "checked";}}?>>
<?=$shuffledItem[1]?>
</label>
	                            	</div>
<?php endforeach?>
</fieldset>
<?php endforeach?>

                        <!-- Informations sur le joueur -->

                        <fieldset>
                            <legend>Informations personelles :</legend>
                            <div class="input-group">
	            				<div class="input-group-addon">Pseudo</div>
	              				<input name="pseudo" class="form-control pull-right" type="text" placeholder="Saisir un nom d'utilisateur" value="<?php if (isset($_POST["pseudo"])) {echo $_POST["pseudo"];
}
?>">
	            			</div>
	            			<div class="input-group">
	            				<div class="input-group-addon">Email</div>
	              				<input name="email" class="form-control pull-right" type="text" placeholder="Saisir votre adresse email" value="<?php if (isset($_POST["email"])) {echo $_POST["email"];
}
?>">
	            			</div>
                        </fieldset>

                        <button type="submit" class="btn btn-success">Valider le quizz</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
