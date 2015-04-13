<?php
	$title = 'MyPoll - Créez votre propre sondage en quelques clics, sans inscription!';
	$countQuery = $pdo->prepare('SELECT COUNT(*) AS count FROM sondages');
	$countQuery->execute();
	$countResult = $countQuery->fetch();

	$lastPollsQuery = $pdo->prepare('SELECT * FROM sondages WHERE private = 0 ORDER BY id DESC LIMIT 5');
	$lastPollsQuery->execute();
	$lastPollsResult = $lastPollsQuery->fetchAll();
	if (!empty($_POST)){
		function sanitize($input) {
    		return htmlspecialchars(trim($input));
		}

		$_POST['private'] 	   = isset($_POST['private']) ? 1 : 0; // Pour les checkbox on en veut pas enregistrer: 'on' mais 1 pour coché / '' mais 0 pour décoché
		$_POST['multiple'] 	   = isset($_POST['multiple']) ? 1 : 0;
		$_POST['ip_protected'] = isset($_POST['ip_protected']) ? 0 : 1; // Par défaut on veut que la protection IP soit activée donc ici c'est l'inverse

		$errors  = array(); // Array pour afficher les erreurs respectives
		$success = array(); // Si success est rempli, il n'y a plus d'erreurs

		$question     = sanitize($_POST['question']);
		$answers      = array_map('sanitize', $_POST['answers']);
		$answers	  = array_filter($_POST['answers'], 'strlen'); // on ajoute en callback 'strlen' pour enlever les valeurs vides dans l'array tout en laissant les 0
		$multiple     = sanitize($_POST['multiple']);
		$private	  = sanitize($_POST['private']);
		$ip_protected = sanitize($_POST['ip_protected']);

		if (strlen($question) > 5){$success[] = 'question'; unset($errors['question']);}
		else {$errors['question'] = 'Votre question doit faire au moins 6 caractères.';}

		if (count($answers) > 1){$success[] = 'answers'; unset($errors['answers']);}
		else {$errors['answers'] = 'Veuillez indiquer au moins deux réponses possibles.';}

		if ($multiple == '1' || $multiple == '0'){$success[] = 'multiple'; unset($errors['multiple']);}
		else {$errors['multiple'] = 'Veuillez indiquer une valeur valide.';}
		
		if ($private == '1' || $private == '0'){$success[] = 'private'; unset($errors['private']);}
		else {$errors['private'] = 'Veuillez indiquer une valeur valide.';}

		if ($ip_protected == '1' || $ip_protected == '0'){$success[] = 'ip_protected'; unset($errors['ip_protected']);}
		else {$errors['ip_protected'] = 'Veuillez indiquer une valeur valide';}

		if (in_array('question',$success) && in_array('answers',$success) && in_array('multiple',$success) && in_array('private',$success) && in_array('ip_protected',$success)){
			$url 	 = uniqid(rand()); 
			header('Location: ./'.$url);
			$answers = json_encode($answers);
			$prepare = $pdo->prepare('INSERT INTO sondages (url,question,answers,multiple,private,ip_protected) VALUES (:url,:question,:answers,:multiple,:private,:ip_protected)');
			$prepare->bindValue(':url',$url);
			$prepare->bindValue(':question',$question);
			$prepare->bindValue(':answers',$answers);
			$prepare->bindValue(':multiple',$multiple);
			$prepare->bindValue(':private',$private);
			$prepare->bindValue(':ip_protected',$ip_protected);
			$exec = $prepare->execute();
			$lastInsertId = $pdo->lastInsertId();

			function arrayToMultidimensional($inputs){
				$newInput = array();
				foreach($inputs as $input){
					array_push($newInput, array($input,0));
				}
				return $newInput;
			}
			
			$prepareVotes = $pdo->prepare('INSERT INTO votes (voters_ip, votes, sondage_id) VALUES (:voters,:votes,:sondage_id)');
			$prepareVotes->bindValue(':voters', json_encode(array()));
			$answers = json_decode($answers);
			$prepareVotes->bindValue(':votes', json_encode(arrayToMultidimensional($answers)));
			$prepareVotes->bindValue(':sondage_id', $lastInsertId);
			$execVotes = $prepareVotes->execute();
		}
	}
?>
	<p>Un total de <?= $countResult->count ?> sondages a déjà été créé!</p>
	<p>Voici la liste des 5 derniers sondages publics:</p>
	<ul class="last-polls"><?php foreach ($lastPollsResult as $result){echo '<li><a class="result" href="'.$result->url.'">'.$result->question.'</a></li>';} ?> </ul>

	<div class="poll-container">
		<h1>Créez votre sondage</h1>
		<form class="poll-form" action="#" method="POST">
			<label><input type="text" name="question" placeholder="Entrez votre question" value="<?= isset($_POST['question']) ? $_POST['question'] : ''; ?>"></label>
			<?= isset($errors['question']) ? '<p class="error">'.$errors['question'].'</p>' : ''; ?>

			<div class="answers">
				<label><input type="text" name="answers[]" placeholder="Entrez une réponse..." value="<?= isset($_POST['answers'][0]) ? $_POST['answers'][0] : ''; ?>"></label>
				<label><input type="text" name="answers[]" placeholder="Entrez une réponse..." value="<?= isset($_POST['answers'][1]) ? $_POST['answers'][1] : ''; ?>"></label>
			</div>
			<?= isset($errors['answers']) ? '<p class="error">'.$errors['answers'].'</p>' : ''; ?>
			<button type="button" class="more-button">+</button>

			<label><input type="checkbox" name="multiple">Sondage à choix multiples</label>
			<?= isset($errors['multiple']) ? '<p class="error">'.$errors['multiple'].'</p>' : ''; ?>

			<label><input type="checkbox" name="private">Sondage privé - il ne sera accessible que par le lien</label>
			<?= isset($errors['private']) ? '<p class="error">'.$errors['private'].'</p>' : ''; ?>

			<label><input type="checkbox" name="ip_protected">Permettre plusieurs votes sur la même adresse IP</label>
			<?= isset($errors['ip_protected']) ? '<p class="error">'.$errors['ip_protected'].'</p>' : ''; ?>

			<input type="submit" value="Créer le sondage">
		</form>
	</div>
</div>