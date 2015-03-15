<?php

    require 'inc/config.php';
    
    if(!empty($_POST))
    {   
        $prepare = $pdo->prepare('SELECT * FROM users WHERE mail = :mail LIMIT 1');
        
        $prepare->bindValue(':mail',$_POST['mail']);
        $prepare->execute();
        
        $user = $prepare->fetch(); //fetch en
        
        if(!$user) //On test le mail
        {
            echo"<div class='container-fluid'>
                                        <div class='row'>
                                            <div class='col-md-6 col-md-offset-3'>
                                              <div class='alert alert-danger col-sm-12' role='alert'>
                                                  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                  <span class='sr-only'>Error:</span>Mail no valid
                                              </div>
                                            </div>
                                        </div>
                                    </div>";// 5
        }
        else
        {
            if($user->password == hash('sha256',SALT.$_POST['password'])) //On teste le mot de pass hashé
            { 
                header('Location: session.php');
                session_start(); //Démarrage de session 
            }
            else
            {
               echo"<div class='container-fluid'>
                                        <div class='row'>
                                            <div class='col-md-6 col-md-offset-3'>
                                              <div class='alert alert-danger col-sm-12' role='alert'>
                                                  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                                  <span class='sr-only'>Error:</span>Password no valid
                                              </div>
                                            </div>
                                        </div>
                                    </div>";// 5;
            }
        }
        
    }

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body style="margin-top:5%;">
        
    <div class="container-fluid session_form">
       <div class="row">
              
               <div class="col-md-6 col-md-offset-3">
                  
                   <div class="col-md-offset-2">
                        <h2 class="text-center">Formulaire de connexion</h2>
                   </div>
                
                    <form action="#" method="POST" class="form-horizontal">

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

                            <div class="col-sm-10 col-md-offset-2">
                            <input name="submit" type="submit" class=" center-block btn btn-primary btn-lg btn-block">
                            </div>
                    </form>
        </div>
        </div>
</body>
</html>