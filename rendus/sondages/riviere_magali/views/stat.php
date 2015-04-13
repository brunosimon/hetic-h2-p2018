<?php 
$title = 'Stat';

// Redirection si non connecté
if(empty($_SESSION['pseudo'])) 
{
  header('Location:login');
  exit();
}

// Récupération de la somme de tous les votes des héros
$prepare = $pdo->prepare('SELECT SUM(vote) AS total FROM heroes');
$prepare->execute();
$total = $prepare->fetch();
// Récupération de tous les héros triés par nombre de vote
$prepare = $pdo->prepare('SELECT * FROM heroes ORDER BY vote DESC');
$prepare->execute();
$heroes = $prepare->fetchAll();
// Récupération du nombre de vote de l'utilisateur
$prepare = $pdo->prepare('SELECT vote FROM users WHERE pseudo = :pseudo');
$prepare->bindValue(':pseudo', $_SESSION['pseudo']);
$prepare->execute();
$user_vote = $prepare->fetch();

?>

<div class="heroes-vote">
	Les Héros du Nexus ont été sélectionnés <?php echo $total->total ?> fois.
</div>
<div class="user-vote">
	Vous avez effectué <?php echo $user_vote->vote ?> fois le QCM.
</div>

<div class="img">

<?php foreach ($heroes as $value) { ?>
	<div>
		<a href="<?= $value->url ?>" target="_blank">
			<img src="src/img/<?= $value->name ?>.png" alt="<?= $value->name ?>" width="120px" height="120px" class="rotate">
		</a>
		<span class="stat-vote"><?= $value->vote ?></span>
	</div>

<?php } ?>
</div>