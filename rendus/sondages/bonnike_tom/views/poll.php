<?php
	$q = $_GET['q'];

	$prepare = $pdo->prepare('SELECT * FROM sondages where url = :url');
	$prepare->bindValue(':url',$q);
	$prepare->execute();
	$results = $prepare->fetch();
	$title = 'MyPoll - '.$results->question;

	if (!empty($_POST)){
		$error   = '';
		$success = false;

		if ($results->multiple == 0){ // Si le sondage n'est pas à choix multiple
			$choices = $_POST['choices'];
			unset($choices[array_search('1', $choices)+1]);
			$choices = array_values($choices);

			if (count(in_array('1', $choices) == 1)){$success = true; unset($error);}// On vérifie que l'utilisateur n'a pas "triché" pour pouvoir cocher plusieurs réponses
			else if (count(in_array('1', $choices) == 0)){$error = 'Veuillez cocher une réponse.';}// On vérifie si l'utilisateur n'a rien coché
			else {$error = 'Veuillez ne cocher qu\'une seule réponse.';}
		}

		else {
			$choices = $_POST['choices'];
			$deleteKeys = array_keys($choices, '1');
			foreach ($deleteKeys as $key){unset($choices[$key+1]);}
			$choices = array_values($choices);

			if (!in_array('1', $choices)){$error = 'Veuillez cocher au moins une réponse.';} // On vérifie si l'utilisateur n'a rien coché
			else {$success = true; unset($error);}
		}


		if ($success == true){
			header('Location: ./'.$results->url.'/results');
			$getVotes = $pdo->prepare('SELECT votes FROM votes WHERE sondage_id = :sondage_id');
			$getVotes->bindValue(':sondage_id', $results->id);
			$getVotes->execute();
			$getVotesResults = $getVotes->fetch();
			$newVotes 		 = json_decode($getVotesResults->votes);

			for ($i = 0; $i < count($choices); $i += 1){
				if ($choices[$i] == '1'){
					$newVotes[$i][1] += 1;
				}
			}

			$prepare = $pdo->prepare('UPDATE votes SET votes = :votes WHERE sondage_id = :sondage_id');
			$prepare->bindValue(':votes', json_encode($newVotes));
			$prepare->bindValue(':sondage_id', $results->id);
			$prepare->execute();

		}
	}
?>
<h1><?= $results->question ?></h1>
<div class="poll-container">
	<form class="poll-form-answering" action="#" method="POST">
		<?php
			$answers = json_decode($results->answers);

			if ($results->multiple == 0){
				foreach($answers as $answer){
					echo '<label><input type="radio" name="choices[]" value="1"><input type="hidden" name="choices[]" value="0">'.$answer.'</label>';
				}
			}
			else {
				foreach($answers as $answer){
					echo '<label><input type="checkbox" name="choices[]" value="1"><input type="hidden" name="choices[]" value="0">'.$answer.'</label>';
				}
			}

		echo isset($error) ? '<p class="error">'.$error.'</p>': ''; 
		?>
		<input type="submit" value="Voter">
		<button type="button" class="result-button" onclick="location.href='<?= $results->url.'/results' ?>'">Résultats</button>
	</form>
</div>