<?php
	require 'inc/function.php';
	require 'inc/config.php';
	require 'inc/insert.php';
	//if vote sente

	$mess = '';

	if(!empty($_GET['vote']))
	{
		//Limit au cas ou il y aurais une deuxième ligne sait-on jamais
		$prepare = $pdo->prepare( 'SELECT * FROM vote WHERE ip = :ip and id_candidates = :idcandi limit 1' );
		$prepare->bindValue( ':ip',get_client_ip() );
		$prepare->bindValue( ':idcandi',$_GET['vote']);
		$prepare->execute();
	
		if($prepare->fetchColumn() == 0)
		{
			insert($pdo);
			$mess = 'Tu as voté bravo';
		}
		else
		{
			$prepare = $pdo->prepare( 'SELECT * FROM vote WHERE ip = :ip and id_candidates = :idcandi limit 1' );
			$prepare->bindValue( ':ip',get_client_ip() );
			$prepare->bindValue( ':idcandi',$_GET['vote']);
			$prepare->execute();

			$date = $prepare->fetch()->date;
			$date = date('Y-m-d', strtotime($date. ' + 1 days'));

			if(valid_date($date)){
				insert($pdo);
				$mess = 'Tu as voté bravo';
			}else{
				$mess = 'Tu peux pas voter deux fois pour le même produit';
			}
		}
	}

	if(!empty($_GET['delvote'])){
		enlever_vote($pdo, $_GET['delvote'], get_client_ip());
	}


	if(!empty($_POST['nom']) && !empty($_POST['url']) && !empty($_POST['com'])){
		insert_objet($pdo, $_POST['nom'], $_POST['url'], $_POST['com']);
	}
	// get all candidates
	$query 		= $pdo->query( 'SELECT * FROM candidates' );
	$candidates = $query->fetchall();

	//Get total
	$query = $pdo->query( 'SELECT SUM(votes) AS total FROM candidates' );
	$total = $query->fetch()->total;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Neuton' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
      <div class="blog-header">
        <h1 class="blog-title">Useless product hunt</h1>
        <p class="lead blog-description">Votez pour le produit le plus inutile.</p>
        	<p><?php echo  (is_null($mess)) ? '' : $mess ?> </p>
      </div>
      <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-post">
		    
		    <table class="table table-condensed">
		      <thead>
		        <tr>
		          <th>Le nom</th>
		          <th>Image</th>
		          <th>Commentaire</th>
		          <th>Votes</th>
		        </tr>
		      </thead>
		      <tbody>
		      	<?php foreach($candidates as $_candidate): ?>
		        <tr>
		        	<td><?= $_candidate->name ?></td>
		        	<td><img style="max-width: 200px;" src="<?= $_candidate->url ?>"></td>
		        	<td><?= $_candidate->commentaire ?></td>
		        	<td><?= $_candidate->votes ?></td>
					<td><a href="?vote=<?= $_candidate->id ?>">Voter</a></td>
					<?php if(test_objet($pdo, $_candidate->id, get_client_ip())){ ?>
						<td><a href="?delvote=<?= $_candidate->id ?>">Dévoter</a></td>
					<?php } ?>
		        </tr>
		   		<?php endforeach; ?>
		      </tbody>
		    </table>

			<div>
				Total : <?= $total ?>
			</div>
          </div>

	        <div class="blog-post">	    
				<form method="post">
					<div class="form-group">
						<label for="nom">Nom de l'objet : </label>
							<input class="form-control"  name="nom" id="nom" type="text"/>						
					</div>

					<div class="form-group">
						<label for="url">Url de l'image : </label>
							<input class="form-control" name="url" id="url" type="text"/>						
					</div>

					<div class="form-group">
						<label for="com">Commentaire :	</label>
							<textarea class="form-control" rows="3" name="com" id="com"></textarea>
					</div>
					<input type="submit" class="btn btn-default" value="Envoyer"/>
				</form>
          </div>
      	</div>

      </div>
    </div>







</body>
</html>