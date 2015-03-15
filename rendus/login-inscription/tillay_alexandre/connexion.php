<?php
	$title = "Connexion";
	session_start();
	if(isset($_SESSION['login'])){
		header('Location: membres');
	}
	require 'inc/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
			<h1 class="site-title">Connexion</h1>
			<div class="panel panel-default">  		
			  	<div class="panel-body top10">
			  		<div id="alert-message"></div>

			  		<!-- Connexion -->
			  		<form method="post" onsubmit="return login(this);" id="normalLogin">
						
	            		<div class="input-group">
	            			<div class="input-group-addon"><i class="fa fa-user"></i></div>
	              			<input class="form-control pull-right" type="text" name="user" placeholder="Pseudo ou adresse mail">
	            		</div>
	          	
	          		
	            		<div class="input-group">
	            			<div class="input-group-addon"><i class="fa fa-lock"></i></div>
	              			<input class="form-control pull-right" type="password" name="password" placeholder="Mot de passe">
	            		</div>
	       
	    
						<button type="submit" value="Connexion" class="btn btn-primary w100" id="login-form">Connexion</button>
					
						<a class="switch-link" href="#"  onclick="loginDisplay('reset')">&rarr; Mot de passe oublié ?</a>
					</form>
					
					<!-- Réinitialisation de mot de passe -->
					<form method="post" onsubmit="return resetPassword(this);" id="resetLogin" style="display:none">
				        <div class="input-group">
		        			<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
		          			<input class="form-control pull-right" type="text" name="mail" placeholder="Saisir votre adresse mail">
		        		</div>
		  
		        		<button type="submit" value="Réinitialiser le mot de passe" class="btn btn-primary w100" id="reset-form">Réinitialiser le mot de passe</button>
		        	
			        	<a class="switch-link" href="#" onclick="loginDisplay('login')">&rarr; Retourner à la connexion</a>
			        </form>

				</div>
			</div>  		
		</div>
		
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" id="inscription">
			<a href="inscription" class="btn btn-success btn-lg w100">Pas encore inscrit ?</a>
		</div>
	</div>
</div>
</body>
</html>