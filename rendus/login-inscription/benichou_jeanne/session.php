<?php
if(session_start()== false){
     header('Location: login.php');
}
else{
$_SESSION['pseudo'] = $user->pseudo;

    require 'inc/config.php';

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
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-6 col-md-offset-3'>
                <div class='jumbotron'>
                    <h1>Hello, <?php $_SESSION['pseudo']; ?><small></br>J'aurais essayé!</small></h1>
                        </div>
                    </div>
                </div>
            </div>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-6 col-md-offset-3'>
                    <div class='alert bg-success col-sm-12' role='alert'>
                        <span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span>
                        <span class='sr-only'></span>You are connected
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
