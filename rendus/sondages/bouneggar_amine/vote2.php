<?php
require 'inc/config.php';


if (!empty($_GET['vote'])) 
{

	$prepare = $pdo->prepare('UPDATE premierleague SET votes = votes + 1 WHERE id = :id');
	$prepare->bindValue('id',$_GET['vote']);
	$prepare->execute();

}

$query = $pdo->query('SELECT SUM(votes) total_votes FROM premierleague');
$total_votes = $query->fetch()->total_votes;

?>

<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset='UTF-8'>
	<title>Votes</title>
</head>
<body>
	<div>Merci d'avoir voter !</br>Total des votes: <?= $total_votes ?></div>
</body>
</html>
