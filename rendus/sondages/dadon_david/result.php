<?php
require('config.php');
// Envoie de la requête dans la base de donnnée


// Je check si tous les champs sont remplis
if (!empty($_POST['vote']) and !empty($_POST['sex']) and !empty($_POST['city']) and !empty($_POST['age']) )
{
$vote = $_POST['vote'];
$sex = $_POST['sex'];
$city = $_POST['city'];
$age = $_POST['age'];

// J'envoie la requete via PDO

$prepare = $pdo->prepare('INSERT INTO googlechart(id, date, vote, sex, city, age) VALUES(NULL,CURRENT_DATE(),:vote,:sex,:city,:age)');

$prepare-> bindValue(':vote', $vote);
$prepare-> bindValue(':sex', $sex);
$prepare-> bindValue(':city', $city);
$prepare-> bindValue(':age', $age);

$prepare->execute();

}
?>
<html>
  <head>
  <link rel="stylesheet" href="./result.css">
  <meta charset="UTF-8">
  </head>
<!-- Les graphiques sont stockés dans un container, ils ont un ID different pour que leurs contenu le sois mais la même class pour faciliter la mise en forme-->
  <body>
	  <div class="container">
		<div id="chart_div1" class="chart"></div>
		<div id="chart_div2" class="chart"></div>
		<div id="chart_div3" class="chart"></div>
		<div id="chart_div4" class="chart"></div>
		<div id="chart_div5" class="chart"></div>
		<div id="chart_div6" class="chart"></div>
		<div id="chart_div7" class="chart"></div>
		<div id="chart_div8" class="chart"></div>
		<div id="chart_div9" class="chart"></div>
	</div>

	
  </body>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="./result.js"></script>
</html>