<?php
	$q = $_GET['q'];
	$q = str_replace('/results', '', $q);
	$prepare = $pdo->prepare('SELECT * FROM sondages WHERE url = :url');
	$prepare->bindValue(':url',$q);
	$prepare->execute();
	$results = $prepare->fetch();

	$title = 'MyPoll - Results';

	$prepare = $pdo->prepare('SELECT votes FROM votes WHERE sondage_id = :sondage_id');
	$prepare->bindValue(':sondage_id', $results->id);
	$prepare->execute();
	$voteResults = $prepare->fetch();

	$answers = json_decode($voteResults->votes);
?>
<h1>Resultat de '<?= $results->question ?>'</h1>
<ul>
	<?php 
		foreach ($answers as $answer){
			echo '<li>'.$answer[0].': '.$answer[1].' votes.</li>';
		}
	?>
</ul>

<button type="button" class="result-button" onclick="location.href='../<?= $results->url ?>'">Voir le sondage</button>