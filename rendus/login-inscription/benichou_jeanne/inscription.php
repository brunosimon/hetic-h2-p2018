<?php
        require 'inc/config.php';

    	if(!empty($_POST))
	{	
        // 1 Vérifie si le champ mail est remplie 
		if(!empty($_POST['mail'])) 
		{
			// 2 Vérifie si la chaine ressemble à un email 
			if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) 
			{
                // 3 Vérifie le champ password est remplie
				if(!empty($_POST['password']))
					{
                        // 4 Vérifie si le password est assez long
						if(strlen($_POST['password'])>=6)
						{
                            // 5 Vérifie si les deux passwords sont identiques
							if($_POST['password'] == $_POST['confirm_password'])
							{
                                // 6 Vérifie pas de doublons dans pseudo ?

                                    $prepare = $pdo->prepare('INSERT INTO users (mail,password,pseudo) VALUES (:mail,:password,:pseudo)');
                                    
                                    $prepare->bindValue(':pseudo',$_POST['pseudo']);
                                    $prepare->bindValue(':mail',$_POST['mail']);
                                    $prepare->bindValue(':password',hash('sha256',SALT.$_POST['password']));
                                    $prepare->execute();
                                    $user = $prepare->fetch(); //fetch en
                                    header('Location: login.php');
                            
                                }
							 
                            else
                            {
								echo"<div class='container-fluid'>
                                        <div class='row'>
                                            <div class='col-md-6 col-md-offset-3'>
                                              <div class='alert alert-danger col-sm-12' role='alert'>
                                                  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                  <span class='sr-only'>Error:</span>Enter the same password for confirm your inscription
                                              </div>
                                            </div>
                                        </div>
                                    </div>";// 5
							}
						} 
                        else
                        {
							echo "<div class='container-fluid'>
                                    <div class='row'>
                                        <div class='col-md-6 col-md-offset-3'>
                                          <div class='alert alert-danger col-sm-12' role='alert'>
                                              <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                              <span class='sr-only'>Error:</span>Enter a password more than 6 character.
                                          </div>
                                        </div>
                                    </div>
                                </div>";// 4
						}
					} 
                    else
                    {
						echo "<div class='container-fluid'>
                                <div class='row'>
                                    <div class='col-md-6 col-md-offset-3'>
                                      <div class='alert alert-danger col-sm-12' role='alert'>
                                          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                          <span class='sr-only'>Error:</span>Enter a password
                                      </div>
                                    </div>
                                </div>
                            </div>";// 3
					}
			} 
            else
            {
				echo "<div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-6 col-md-offset-3'>
                              <div class='alert alert-danger col-sm-12' role='alert'>
                                  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                  <span class='sr-only'>Error:</span>Enter a valid email address
                              </div>
                            </div>
                        </div>
                    </div>";// 2
			}
		} 
        else
        {
			echo "<div class='container-fluid'>
                    <div class='row'>
                        <div class='col-md-6 col-md-offset-3'>
                          <div class='alert alert-danger col-sm-12' role='alert'>
                              <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                              <span class='sr-only'>Error:</span>Enter an email address
                          </div>
                        </div>
                    </div>
                </div>"; // 1
		}
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INSCRIPTION</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body style="margin-top:5%;">

  <div class="container-fluid">
       <div class="row">
              
               <div class="col-md-6 col-md-offset-3">
                  
                   <div class="col-md-offset-2">
                        <h2 class="text-center">Formulaire d'inscription</h2>
                   </div>
                
                    <form action="#" method="POST" class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pseudo</label>    
                            <div class="col-sm-10">
                                <input type="text" name="pseudo" class="form-control">
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <label class="col-sm-2 control-label">Mail</label>
                            <div class="col-sm-10">
                               <div class="input-group">
                                    <span class="input-group-addon glyphicon-envelope"></span>
                                    <input type="text" name="mail" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>    
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                        </div>  
                            <div class="col-sm-10 col-md-offset-2">
                            <input name="submit" type="submit" class=" center-block btn btn-primary btn-lg btn-block">
                            </div>
                    </form>
        </div>
        </div>
    </div>
</body>
</html>