<?php

$time = 6;

header( "refresh:$time; welcome.php" );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Password</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,800italic,300,400,700,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript">
		
		var count = 6;
		var counter=setInterval(timer, 1000);

		function timer()
			{
			  count=count-1;
			  if (count <= 0)
			  {
			     clearInterval(counter);
			     return;
			  }

			 document.getElementById("timer").innerHTML = count; // watch for spelling
			}

	</script>

</head>
<body>
<div class="container">
	<h1>Time out</h1>
	<p>You have tried to many times to get your password right.</p>

	<p class="wait">Wait <span id="timer"></span>  seconds.</p>
</div>
</body>
</html>