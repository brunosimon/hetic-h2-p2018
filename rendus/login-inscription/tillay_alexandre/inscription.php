<?php
	$title = "Inscription";
	session_start();
	if(isset($_SESSION['login'])){
		header('Location: membres');
	}
	require 'inc/header.php';
?>
<div class="container">
	<div class="row top20">
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
			<h1 class="site-title">Inscription</h1>
			<div class="panel panel-default">
			  	<div class="panel-body">
			  		<div id="alert-message"></div>
			  		<form method="post" onsubmit="return register(this);">
						
	            		<div class="form-group">
						    <label>Pseudo</label>
						    <input type="text" class="form-control" name="username" placeholder="Saisir un nom d'utilisateur">
						</div>

						<div class="form-group">
						    <label>Email</label>
						    <input type="text" class="form-control" name="mail" placeholder="Saisir votre adresse mail">
						</div>

						<div class="form-group">
						    <label>Mot de passe</label>
						    <input type="password" class="form-control" name="password" placeholder="Saisir un mot de passe">
						</div>

						<div class="form-group">
						    <label>Confirmation mot de passe</label>
						    <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirmer votre mot de passe">
						</div>

	    				<button type="submit" value="Inscription" class="btn btn-success w100" id="register-form">S'inscrire</button>				

					</form>
					
				</div>
			</div>  		
		</div>
		
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
			<a href="connexion" class="btn btn-primary btn-lg w100">Déjà inscrit ?</a>
		</div>
	</div>
</div>
</body>
