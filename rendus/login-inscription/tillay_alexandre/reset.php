<?php 
	$title = "Réinitialiser votre mot de passe";
	
	require 'inc/config.php';

	$find=false;

	if(isset($_GET['mail'])&&isset($_GET['token'])) {
		$mail = $_GET['mail'];
		$token = $_GET['token'];

		$result = $pdo->prepare('SELECT * FROM users WHERE mail=:mail AND token=:token');
		$result->bindValue(':mail', $mail);
		$result->bindValue(':token', $token);
		$result->execute();

		if($result->fetch()) {
			$find=true;
		}
	}
	else {
		header('Location: index');
	}
	require 'inc/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
			<div class="panel panel-default top30"> 
				<div class="panel-heading">
		    		<h3 class="panel-title" style="color:#555">Réinitialiser votre mot de passe</h3>
		 		</div> 		
			  	<div class="panel-body top10">

			  		<?php if($find) : ?>
				  		<div id="alert-message"></div>
						
				  		<!-- Nouveau mot de passe -->
				  		<form method="post" onsubmit="return setNewPassword(this);" id="normalLogin">
							
		            		<div class="form-group">
							    <label>Nouveau mot de passe</label>
							    <input type="password" class="form-control" name="password" placeholder="Saisir un nouveau mot de passe">
							</div>

							<div class="form-group">
							    <label>Confirmation mot de passe</label>
							    <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirmer votre mot de passe">
							</div>

							<input type="hidden" value="<?=$mail?>" name="mail">
							<input type="hidden" value="<?=$token?>" name="token">              
		    
							<button type="submit" value="Reset" class="btn btn-primary w100" id="reset-form">Réinitialiser</button>
						
						</form>

					<?php else : ?>
						<div class="alert alert-small alert-danger">Votre demande n'est pas valide, veuillez recommencer le processus de réinitialisation du mot de passe.</div>
					<?php endif ?>
					
				</div>
			</div>  		
		</div>
		
	</div>
</div>
</body>
</html>