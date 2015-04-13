<?php

	include 'web/config.php';


	/* GET ID */

	$id = explode('/', $_GET['q']);
	$id = $id[sizeof($id) - 1];


	/* GET SURVEY */

	$survey = $pdo->prepare('SELECT * FROM surveys WHERE id = :id');
	$survey->execute(array(
		'id' => $id
	));
	$survey = $survey->fetch();

?>

<main style="background-image:url('<?php echo $survey->image; ?>');">
	<div class="filter"></div>
	<div class="container flex-container h-centered-container v-centered-container">
		
		<h1><?php echo $survey->name; ?></h1>
		<p><?php echo $survey->description ?></p>
		<a href="<?php echo $id; ?>/issue-1" class="btn btn-next"><span>Commencer</span></a>

	</div>
</main>